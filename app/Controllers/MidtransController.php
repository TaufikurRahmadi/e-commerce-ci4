<?php

namespace App\Controllers;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use App\Models\OrderModel;
use App\Models\UserModel;

class MidtransController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();

        // Konfigurasi Midtrans
        Config::$serverKey = 'SB-Mid-server-wUc-FBjWCA8RjIjmQrE0JuL5'; // Ganti dengan server key Midtrans Anda
        Config::$isProduction = false; // Ubah ke `true` jika menggunakan mode production
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
    public function checkout()
{
    $user = user(); // Ambil data pengguna yang sedang login
    if (!$user) {
        return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Ambil semua item dari keranjang berdasarkan username pengguna
    $keranjangItems = $this->keranjangModel->where('nama', $user->username)->findAll();

    if (empty($keranjangItems)) {
        return redirect()->back()->with('error', 'Keranjang Anda kosong.');
    }

    // Inisialisasi total harga
    $totalHarga = 0;

    // Proses setiap item dalam keranjang
    foreach ($keranjangItems as $item) {
        $totalHarga += $item['harga'] * $item['jumlah']; // Hitung total harga
    }

    // Buat data pesanan
    $orderData = [
        'id_user'     => $user->id,
        'nama_user'   => $user->username,
        'total_harga' => $totalHarga,
        'status'      => 'pending',
        'quantity'    => count($keranjangItems), // Total jumlah item
    ];

    // Simpan pesanan dan ambil ID pesanan
    $orderId = $this->orderModel->insert($orderData);

    if (!$orderId) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan pesanan.');
    }

    // Simpan setiap item pesanan
    foreach ($keranjangItems as $item) {
        $orderItemData = [
            'order_id'    => $orderId,
            'barang_id'   => $item['barang_id'],
            'nama_barang' => $item['nama_barang'],
            'jumlah'      => $item['jumlah'],
            'harga'       => $item['harga'],
        ];
        $this->orderItemModel->insert($orderItemData);
    }

    // Hapus semua item dari keranjang setelah checkout
    $this->keranjangModel->where('nama', $user->username)->delete();

    // Alihkan ke halaman pembayaran menggunakan Midtrans
    return redirect()->to('/midtrans/createTransaction/' . $orderId)->with('success', 'Checkout berhasil! Silakan lanjutkan ke pembayaran.');
}

    // Membuat transaksi pembayaran
    public function createTransaction($orderId)
    {
        $order = $this->orderModel->find($orderId);
    
        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    
        // Konfigurasi transaksi
        $transactionDetails = [
            'order_id' => $order['id'], // ID pesanan unik
            'gross_amount' => $order['total_harga'], // Total harga
        ];
    
        $itemDetails = [
            [
                'id' => $order['id'],
                'price' => $order['total_harga'],
                'quantity' => $order['quantity'],
                'name' => $order['nama_barang'],
            ]
        ];
    
        $customerDetails = [
            'first_name' => $order['nama_user'],
            'email' => $order['email_user'],
        ];
    
        $transaction = [
            'transaction_details' => $transactionDetails,
            'item_details' => $itemDetails,
            'customer_details' => $customerDetails,
        ];
    
        try {
            // Mendapatkan Snap Token
            $snapToken = Snap::getSnapToken($transaction);
            
            // Mengarahkan ke view pembayaran dengan snapToken
            return view('user/payment', ['snapToken' => $snapToken, 'order' => $order]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Menangani notifikasi dari Midtrans
    public function handleNotification()
    {
        $notif = new Notification();

        $transaction = $notif->transaction_status;
        $orderId = $notif->order_id;

        $order = $this->orderModel->find($orderId);

        if (!$order) {
            return $this->response->setStatusCode(404, 'Pesanan tidak ditemukan.');
        }

        if ($transaction === 'capture') {
            if ($notif->fraud_status === 'accept') {
                $this->orderModel->update($orderId, ['status' => 'completed']);
            }
        } elseif ($transaction === 'settlement') {
            $this->orderModel->update($orderId, ['status' => 'completed']);
        } elseif ($transaction === 'pending') {
            $this->orderModel->update($orderId, ['status' => 'pending']);
        } elseif ($transaction === 'deny' || $transaction === 'cancel' || $transaction === 'expire') {
            $this->orderModel->update($orderId, ['status' => 'failed']);
        }

        return $this->response->setStatusCode(200, 'Notifikasi diproses.');
    }

    // Menampilkan status transaksi
    public function transactionStatus($orderId)
    {
        try {
            $status = \Midtrans\Transaction::status($orderId);
            return view('user/transaction_status', ['status' => $status]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
