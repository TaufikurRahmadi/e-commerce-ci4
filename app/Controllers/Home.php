<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KeranjangModel;

class Home extends BaseController
{
    protected $barangModel;
    protected $keranjangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->keranjangModel = new KeranjangModel();
    }

    public function index()
{
    $barangModel = new \App\Models\BarangModel(); // Pastikan model ini benar
    $data['barang'] = $barangModel->findAll(); // Ambil semua data barang

    return view('index', $data); // Kirim data ke view
}
    public function register(): string
    {
        return view('auth/register');
    }
    public function adminindex(): string
    {
        return view('admin/adminindex');
    }
    public function addToCart($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan.');
        }
        $jumlah = $this->request->getPost('jumlah');
        if ($jumlah <= 0) {
            return redirect()->back()->with('error', 'Jumlah harus lebih dari 0.');
        }

        $this->keranjangModel->insert([
            'barang_id' => $barang['barang_id'],
            'jumlah' => $jumlah,
            'nama_barang' => $barang['nama_barang'],
            'harga' => $barang['harga'] * $jumlah, // Total harga berdasarkan jumlah
            'foto' => $barang['foto'],
            'tentang' => $barang['tentang']
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }
    public function deletefromcart($id)
{
    // Cek apakah item dengan ID tersebut ada di keranjang
    $itemKeranjang = $this->keranjangModel->find($id);

    if (!$itemKeranjang) {
        return redirect()->to('/toko')->with('error', 'Item tidak ditemukan di keranjang.');
    }

    // Hapus item dari keranjang
    if ($this->keranjangModel->delete($id)) {
        return redirect()->to('/toko')->with('success', 'Item berhasil dihapus dari keranjang.');
    }

    return redirect()->to('/toko')->with('error', 'Gagal menghapus item dari keranjang.');
}


}
