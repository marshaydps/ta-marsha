<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\PengaturanTesModel;
use CodeIgniter\HTTP\Request;

class HomeController extends BaseController
{
    protected $pengaturanTesModel;
    //supaya kalau kelas dipanggil model otomatis terpanggil
    public function __construct()
    {
        $this->pengaturanTesModel = new PengaturanTesModel();
    }

    public function index()
    {
        $data = [
            'waktu_pengerjaan_tes_tulis' => $this->pengaturanTesModel->first()['waktu_pengerjaan_tes_tulis'],
            'waktu_pengerjaan_tes_kepribadian' => $this->pengaturanTesModel->first()['waktu_pengerjaan_tes_kepribadian'],
        ];
        return view('/pages/mahasiswa/home', $data);
    }

    public function masukkanNama()
    {
        $nama = $this->request->getPost('nama');
        $newdata = [
            'nama'  => $nama,
            'isLoggedIn' => true,
        ];
        $session = session();
        $session->set($newdata);
        return redirect('pages/mahasiswa');
    }

    public function keluar()
    {
        $session = session();
        $session->destroy();
        return redirect('pages/mahasiswa');
    }
}
