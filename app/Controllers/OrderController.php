<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KeranjangModel;
use App\Models\OrderItemModel;
use App\Models\OrderModel;

class OrderController extends BaseController
{
    protected $barangModel;
    protected $keranjangModel;
    protected $orderModel;
    protected $orderItemModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->orderItemModel = new OrderItemModel();
        $this->barangModel = new BarangModel();
        $this->keranjangModel = new KeranjangModel();
    }

    // Menampilkan semua pesanan untuk admin
    public function index()
    {
        $pendingOrders = $this->orderModel->where('status', 'pending')->findAll();

        $data['orders'] = $this->orderModel->findAll();
        return view('admin/pesanan', $data,$pendingOrders);
    }

    // Memperbarui status pesanan
    public function update($id)
    {
        $status = $this->request->getPost('status');

        if ($this->orderModel->find($id)) {
            $this->orderModel->update($id, ['status' => $status]);
            return redirect()->to('/toko/admin/pesanan')->with('success', 'Status pesanan berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
    }

    // Menghapus pesanan
    public function delete($id)
    {
        if ($this->orderModel->find($id)) {
            $this->orderModel->delete($id);
            return redirect()->to('/toko/admin/pesanan')->with('success', 'Pesanan berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
    }

    // Menampilkan pesanan untuk pengguna yang login
    public function userOrder()
    {
        // Check if the user is logged in
        if (!session()->has('id_user')) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk melihat pesanan.');
        }
    
        $userId = session()->get('id_user'); // Get user ID from session
        $pendingOrders = $this->orderModel->where('status', 'pending')->findAll();

    
        // Fetch orders based on user_id
        $orders = $this->orderModel->where('id_user     ', $userId)->findAll();
    
        // Pass the orders to the view
        return view('user/tampilan', ['orders' => $orders]);
    }
}