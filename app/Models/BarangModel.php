<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['nama_barang', 'harga', 'foto','tentang'];
    protected $useTimestamps = true;
}
