<?php

namespace App\Models;

use CodeIgniter\Model;

class tulisModel extends Model
{
    protected $table = 'tulis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar', 'teks'];
}
