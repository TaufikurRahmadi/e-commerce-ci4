<?php

namespace App\Controllers;

use App\Models\OrderModel;

class OrderController extends BaseController
{
    protected $orderModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
    }

    // Method to display orders for the logged-in user
    public function index()
    {
        // Check if the user is logged in
        if (!session()->has('id_user')) {
            return redirect()->to('/login')->with('error', 'Anda harus login untuk melihat pesanan.');
        }

        $userId = session()->get('id_user'); // Get user ID from session

        // Fetch orders based on user_id using the model method
        $orders = $this->orderModel->getOrdersByUserId($userId);

        // Pass the orders to the view
        return view('user/tampilan', ['orders' => $orders]);
    }
}