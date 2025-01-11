<?
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\OrderItemModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
    protected $pesananModel;

    public function __construct()
    {
        $this->PesananModel = new pesananModelModel();
    }
    public function checkout()
    {
        $user = user(); // Mendapatkan data pengguna yang login
        if (!$user) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
        }
    
        $keranjangItems = $this->keranjangModel->where('nama', $user->username)->findAll();
    
        if (empty($keranjangItems)) {
            return redirect()->back()->with('error', 'Keranjang Anda kosong.');
        }
    
        // Hitung total harga
        $totalHarga = array_sum(array_column($keranjangItems, 'harga'));
    
        // Simpan data ke tabel orders
        $orderId = $this->orderModel->insert([
            'user_id'     => $user->id,
            'total_harga' => $totalHarga,
            'status'      => 'pending',
        ]);
    
        // Simpan detail barang ke tabel order_items
        foreach ($keranjangItems as $item) {
            $this->orderItemModel->insert([
                'order_id'    => $orderId,
                'barang_id'   => $item['barang_id'],
                'nama_barang' => $item['nama_barang'],
                'jumlah'      => $item['jumlah'],
                'harga'       => $item['harga'],
            ]);
        }
    
        // Kosongkan keranjang
        $this->keranjangModel->where('nama', $user->username)->delete();
    
        return redirect()->to('/orders')->with('success', 'Checkout berhasil! Pesanan Anda sedang diproses.');
    }
    
}
