<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanTesModel extends Model
{
    protected $table = 'pengaturan_tes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_tes', 'waktu_pengerjaan_tes_kepribadian', 'waktu_pengerjaan_tes_tulis', 'deskripsi'];
}
