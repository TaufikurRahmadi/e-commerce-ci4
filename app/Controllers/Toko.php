<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KeranjangModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\UserModel;
use App\Models\masukanModel;

class Toko extends BaseController
{
    protected $barangModel;
    protected $masukanModel;
    protected $userModel;
    protected $keranjangModel;
    protected $orderModel;
    protected $rderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->barangModel = new BarangModel();
        $this->keranjangModel = new KeranjangModel();
        $this->userModel = new UserModel();
        $this->masukanModel = new masukanModel();

    }

    // READ - Menampilkan semua data
    public function admin()
    {
        // Ambil semua pesanan
        $data['orders'] = $this->orderModel->findAll();
        $data['user'] = $this->userModel->findAll();
        $data['messages'] = $this->masukanModel->findAll();
    
        // Ambil semua barang
        $data['barang'] = $this->barangModel->findAll();
    
        // Hitung jumlah pesanan dengan status "pending"
        $data['pendingCount'] = $this->orderModel->where('status', 'pending')->countAllResults();
        $data['completeCount'] = $this->orderModel->where('status', 'completed')->countAllResults();
        $data['deliveredCount'] = $this->orderModel->where('status', 'delivered')->countAllResults();
    
        // Kirim data ke view
        return view('admin/index', $data);
    }
    public function barang()
    {
        // Ambil semua pesanan
        $data['orders'] = $this->orderModel->findAll();
        $data['user'] = $this->userModel->findAll();
    
        // Ambil semua barang
        $data['barang'] = $this->barangModel->findAll();
    
        
        // Kirim data ke view
        return view('admin/barang', $data);
    }
   
    public function tampilan()
    {
        $data['barang'] = $this->barangModel->findAll();
        $data['keranjang'] = $this->keranjangModel->findAll();
        $data['orders'] = $this->orderModel->findAll();
        return view('user/tampilan', $data);


    }

    public function saveMessage()
    {
        // Validasi input
        $validation = $this->validate([
            'name'    => 'required',
            'email'   => 'required|valid_email',
            'message' => 'required',
        ]);

        if (!$validation) {
            // Jika validasi gagal, kembali ke halaman form dengan pesan error
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $this->masukanModel->insert([
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ]);

        // Kirim data ke Formspree
        $this->sendToFormspree([
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
        ]);

        // Redirect ke halaman tampilan dengan pesan sukses
        return redirect()->to('/toko')->with('success', 'Pesan berhasil dikirim!');
    }

    private function sendToFormspree($data)
    {
        $url = 'https://formspree.io/f/mpwwkpry'; // Gantilah dengan endpoint Formspree Anda

        // Inisialisasi cURL
        $client = \Config\Services::curlrequest();

        // Kirim data menggunakan metode POST ke Formspree
        $response = $client->post($url, [
            'form_params' => $data,
        ]);

        return $response;
    }

    public function deletemassage($id)
    {
        $masukanModel = new masukanModel();

        // Hapus pesan berdasarkan ID
        $masukanModel->delete($id);

        // Redirect ke halaman contact setelah pesan dihapus
        return redirect()->to('toko/admin')->with('success', 'Pesan berhasil dihapus.');
    }


    // CREATE - Menampilkan form tambah data
    public function create()
    {
        return view('admin/create');
    }

    // CREATE - Proses tambah data
    public function store()
    {
        $fileFoto = $this->request->getFile('foto');
        $namaFoto = '';

        if ($fileFoto && $fileFoto->isValid()) {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/foto', $namaFoto);
        }

        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga' => $this->request->getPost('harga'),
            'tentang' => $this->request->getPost('tentang'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/toko/admin')->with('success', 'Barang berhasil ditambahkan.');
    }

    // UPDATE - Menampilkan form edit data
    public function edit($id)
    {
        $data['barang'] = $this->barangModel->find($id);
        return view('admin/edit', $data);
    }

    // UPDATE - Proses edit data
    public function update($id)
    {
        $fileFoto = $this->request->getFile('foto');
        $barang = $this->barangModel->find($id);
        $namaFoto = $barang['foto'];

        if ($fileFoto && $fileFoto->isValid()) {
            if ($namaFoto && file_exists('uploads/foto/' . $namaFoto)) {
                unlink('uploads/foto/' . $namaFoto);
            }
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('uploads/foto', $namaFoto);
        }

        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'harga' => $this->request->getPost('harga'),
            'tentang' => $this->request->getPost('tentang'),
            'foto' => $namaFoto
        ]);

        return redirect()->to('/toko/admin')->with('success', 'Barang berhasil diubah.');
    }

    // DELETE - Menghapus data
    public function delete($id)
    {
        $barang = $this->barangModel->find($id);

        if ($barang['foto'] && file_exists('uploads/foto/' . $barang['foto'])) {
            unlink('uploads/foto/' . $barang['foto']);
        }

        $this->barangModel->delete($id);
        return redirect()->to('/toko/admin')->with('success', 'Barang berhasil dihapus.');
    }

    public function detail($id)
    {
        $data['keranjang'] = $this->keranjangModel->findAll();
        $data['orders'] = $this->orderModel->findAll();
        $data['barang'] = $this->barangModel->find($id);

        if (!$data['barang']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan.');
        }

        return view('user/detail', $data);
    }

    // Tambah ke keranjang
    public function addToCart($id)
    {
        // Dapatkan data barang berdasarkan ID
        $barang = $this->barangModel->find($id);
    
        if (!$barang) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
    
        // Validasi jumlah
        $jumlah = $this->request->getPost('jumlah');
        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0.');
        }
    
        // Dapatkan nama pengguna dari user yang login
        $user = user(); // Fungsi user() mengembalikan data pengguna yang login
        $nama = $user ? $user->username : 'Guest'; // Jika tidak ada pengguna login, gunakan 'Guest'
    
        // Simpan ke dalam keranjang
        $this->keranjangModel->insert([
            'barang_id'   => $barang['barang_id'],
            'jumlah'      => $jumlah,
            'nama_barang' => $barang['nama_barang'],
            'harga'       => $barang['harga'] * $jumlah, // Total harga berdasarkan jumlah
            'foto'        => $barang['foto'],
            'nama'        => $nama, // Nama pengguna
            'tentang'     => $barang['tentang']
        ]);
    
        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
    public function deletefromcart($barang_id)
    {
        // Load model keranjang
        $keranjangModel = new KeranjangModel();

        // Hapus item dari keranjang berdasarkan ID barang
        if ($keranjangModel->where('order_id', $barang_id)->delete()) {
            return redirect()->back()->with('success', 'Barang berhasil dihapus dari keranjang.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus barang dari keranjang.');
    }


    // Tampilkan keranjang
    public function keranjang()
    {
        $keranjang['keranjang'] = $this->keranjangModel->findAll();
        d($keranjang);
        return view('user/tampilan', $keranjang);
    }

    public function checkout()
    {
        $user = user(); // Mendapatkan data pengguna yang login
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        // Ambil item keranjang berdasarkan pengguna
        $keranjangItems = $this->keranjangModel->where('nama', $user->username)->findAll();
    
        if (empty($keranjangItems)) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }
    
        // Simpan data ke tabel orders untuk setiap item di keranjang
        foreach ($keranjangItems as $item) {
            $orderData = [
                'id_user'     => $user->id,
                'nama_user'   => $user->username,
                'nama_barang' => $item['nama_barang'], // Nama barang unik per entri
                'total_harga' => $item['harga'],      // Harga total untuk barang ini
                'status'      => 'pending',
                'quantity'    => $item['jumlah'],     // Jumlah barang dipesan
            ];
    
            $orderId = $this->orderModel->insert($orderData);
    
            if (!$orderId) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan pesanan.');
            }
    
            // Simpan detail barang ke tabel order_items
            $orderItemData = [
                'order_id'    => $orderId,
                'barang_id'   => $item['barang_id'],
                'nama_barang' => $item['nama_barang'],
                'jumlah'      => $item['jumlah'], // Jumlah barang per item
                'harga'       => $item['harga'],  // Harga barang
            ];
            $this->orderItemModel->insert($orderItemData);
        }
    
        // Kosongkan keranjang
        $this->keranjangModel->where('nama', $user->username)->delete();
    
        return redirect()->to('/toko')->with('success', 'Checkout berhasil! Pesanan Anda sedang diproses.');
    }
    
public function orders()
{
    $user = user();
    $orders = $this->orderModel->where('user_id', $user->id)->findAll();

    return view('/admin/index', ['orders' => $orders]);
}
public function payment()
{
    return view('/user/payment');
}
}


