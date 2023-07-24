<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilTesTulisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'hasil_tes_tulis';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['nama_peserta', 'filejawaban', 'tulis_id', 'waktu_pengerjaan'];
}
