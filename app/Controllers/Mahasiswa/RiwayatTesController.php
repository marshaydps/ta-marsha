<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\HasilTesKepribadianModel;
use App\Models\HasilTesTulisModel;

class RiwayatTesController extends BaseController
{
    protected $hasilTesKepribadianModel;
    protected $hasilTesTulisModel;
    //supaya kalau kelas dipanggil model otomatis terpanggil
    public function __construct()
    {
        $this->hasilTesKepribadianModel = new HasilTesKepribadianModel();
        $this->hasilTesTulisModel = new HasilTesTulisModel();
    }
    public function index()
    {
        $data['kepribadian'] = $this->hasilTesKepribadianModel->where('nama_peserta', session()->nama)->findAll();
        $data['tulis'] = $this->hasilTesTulisModel->where('nama_peserta', session()->nama)->findAll();
        return view('/pages/mahasiswa/riwayatTes', $data);
    }

    public function download($id)
    {
        $riwayatSoal = $this->hasilTesTulisModel->find($id);
        return $this->response->download('filejawaban/' . $riwayatSoal['filejawaban'], null);
    }
}
