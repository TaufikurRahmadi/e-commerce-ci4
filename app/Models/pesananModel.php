<?php

namespace App\Models;

use CodeIgniter\Model;

class pesananModel extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $allowedFields = ['barang_id', 'id_user','jumlah', 'total'];
}
