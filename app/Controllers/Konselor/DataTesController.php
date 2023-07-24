<?php

namespace App\Controllers\Konselor;

use App\Controllers\BaseController;
use App\Models\HasilTesKepribadianModel;
use App\Models\HasilTesTulisModel;

class DataTesController extends BaseController
{
    protected $hasilTesKepribadianModel;
    protected $hasilTesTulisModel;
    //supaya kalau kelas dipanggil model otomatis terpanggil
    public function __construct()
    {
        // $this->hasilTesKepribadianModel = new kepribadianModel();
        $this->hasilTesTulisModel = new HasilTesTulisModel();
        $this->hasilTesKepribadianModel = new HasilTesKepribadianModel();
    }
    public function index()
    {
        $data['tulis'] = $this->hasilTesTulisModel->findAll();
        $data['kepribadian'] = $this->hasilTesKepribadianModel->findAll();
        return view('/pages/konselor/dataTes', $data);
    }

    public function download($id)
    {
        $riwayatSoal = $this->hasilTesTulisModel->find($id);
        return $this->response->download('filejawaban/' . $riwayatSoal['filejawaban'], null);
    }
}
