<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\HasilTesTulisModel;
use App\Models\PengaturanTesModel;
use App\Models\tulisModel;

class TesTulisController extends BaseController
{
    protected $pengaturanTesModel;
    protected $tesTulisModel;
    protected $hasilTesTulisModel;
    //supaya kalau kelas dipanggil model otomatis terpanggil
    public function __construct()
    {
        $this->pengaturanTesModel = new PengaturanTesModel();
        $this->tesTulisModel = new tulisModel();
        $this->hasilTesTulisModel = new HasilTesTulisModel();
    }

    public function index()
    {
        $query = $this->tesTulisModel
            ->orderBy('id', 'random')
            ->findAll();
        $tesTulis = array();
        foreach ($query as $value) {
            $tesTulis['id'] = $value['id'];
            $tesTulis['gambar'] = $value['gambar'];
            $tesTulis['teks'] = $value['teks'];
        }

        $data = [
            'tesTulis' => $tesTulis,
            'waktu' => $this->pengaturanTesModel->first()['waktu_pengerjaan_tes_tulis'],
        ];
        return view('/pages/mahasiswa/tesTulis', $data);
    }

    public function siap()
    {
        $newdata = [
            'isReadyTesTulis' => true,
        ];
        $session = session();
        $session->set($newdata);
        return redirect('pages/mahasiswa/tesTulis');
    }

    public function kirimJawaban()
    {
        //ambil gambar
        $file = $this->request->getFile('filejawaban');
        //pindahkan file ke folder img
        $file->move('filejawaban');
        //ambil nama file
        $waktuTes = $this->pengaturanTesModel->first()['waktu_pengerjaan_tes_tulis'];
        $fileJawaban = $file->getName();
        $namaPeserta = $this->request->getPost('nama_peserta');
        $waktuPengerjaan = $this->request->getPost('waktu_pengerjaan');
        $tulisId = $this->request->getPost('tulis_id');
        $waktu_pengerjaan = $waktuTes - $waktuPengerjaan;

        $data = [
            // 'id' => $id,
            'filejawaban' => $fileJawaban,
            'nama_peserta' => $namaPeserta,
            'tulis_id' => $tulisId,
            'waktu_pengerjaan' => $waktu_pengerjaan,
        ];

        $this->hasilTesTulisModel->save($data);
        $newdata = [
            'isSubmitTesTulis' => true,
        ];
        $session = session();
        $session->set($newdata);
        return redirect()->to('/pages/mahasiswa/tesTulis');
    }
}
