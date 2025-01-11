<?php
namespace App\Models;

use CodeIgniter\Model;

class masukanModel extends Model
{
    protected $table         = 'messages';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['name', 'email', 'message'];
    protected $useTimestamps = true;
}
