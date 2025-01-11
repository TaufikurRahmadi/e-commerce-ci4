<?php

namespace App\Models;

use CodeIgniter\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['barang_id', 'jumlah', 'nama_barang', 'harga', 'foto','order_id','nama'];
}
