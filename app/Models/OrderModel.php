<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_user', 'total_harga', 'tanggal_order', 'status','quantity','nama_barang','nama_user'];


    public function getOrdersByUserId($userId)
    {
        $sql = "SELECT * FROM orders WHERE id_user = 3";
        return $this->db->query($sql, [$userId])->getResultArray();
    }
}

