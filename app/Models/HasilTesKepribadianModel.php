<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilTesKepribadianModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hasil_tes_kepribadian';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_peserta', 'waktu_pengerjaan', 'kepribadian_id', 'nilai'];
}
