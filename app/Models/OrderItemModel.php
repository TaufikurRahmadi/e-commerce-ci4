<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'barang_id', 'nama_barang', 'jumlah', 'harga'];
}
