<?php
namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table = 'biodata';
    protected $primaryKey = 'id';
    protected $allowedFields = ['foto', 'nama_lengkap', 'nim', 'program_studi', 'alamat', 'no_telepon'];
}