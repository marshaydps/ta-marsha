<?php

namespace App\Controllers\Mahasiswa;

use App\Controllers\BaseController;
use App\Models\HasilTesKepribadianModel;
use App\Models\kepribadianModel;
use App\Models\PengaturanTesModel;

class TesKepribadianController extends BaseController
{
    protected $pengaturanTesModel;
    protected $kepribadianModel;
    protected $hasilTeskepribadianModel;
    //supaya kalau kelas dipanggil model otomatis terpanggil
    public function __construct()
    {
        $this->pengaturanTesModel = new PengaturanTesModel();
        $this->kepribadianModel = new kepribadianModel();
        $this->hasilTeskepribadianModel = new HasilTesKepribadianModel();
    }

    public function index()
    {
        $peserta = $this->hasilTeskepribadianModel->where('nama_peserta', session()->get('nama'))->first();
        $data = [
            'waktu' => $this->pengaturanTesModel->first()['waktu_pengerjaan_tes_kepribadian'] * 60,
            'tesKepribadian' => $this->kepribadianModel->where('nomor_soal', '1')->first(),
            'skor' => @$peserta['nilai'],
        ];
        return view('/pages/mahasiswa/tesKepribadian', $data);
    }

    public function siap()
    {
        $newdata = [
            'isReadyTesKepribadian' => true,
        ];
        $session = session();
        $session->set($newdata);
        return redirect('pages/mahasiswa/tesKepribadian');
    }

    public function nextSoal()
    {
        $id_soal = $this->request->getPost('id_soal');

        $waktuTes = $this->pengaturanTesModel->first()['waktu_pengerjaan_tes_kepribadian'];
        $waktuPengerjaan = $this->request->getPost('waktu_pengerjaan');
        $waktu_pengerjaan = $waktuTes - $waktuPengerjaan;

        $namaPeserta = $this->request->getPost('nama_peserta');
        $nomor_soal = $this->request->getPost('nomor_soal') + 1;
        $jawaban = $this->request->getPost('jawaban');
        $menit = $this->request->getPost('menit');
        $detik = $this->request->getPost('detik');
        $kems = ($menit * 60) + $detik;

        $peserta = $this->hasilTeskepribadianModel->where('nama_peserta', $namaPeserta)->first();
        $soal = $this->kepribadianModel->find($id_soal);

        $tesKepribadian = $this->kepribadianModel->where('nomor_soal', $nomor_soal)->first();

        if ($soal['jawaban_benar'] == $jawaban) {
            $nilai = $soal['nilai'];
        } else {
            $nilai = 0;
        }

        $data = [
            'waktu' => $kems,
            'tesKepribadian' => $tesKepribadian,
            'skor' => @$peserta['nilai'],
        ];


        if ($peserta) {
            $value = [
                'nama_peserta' => $namaPeserta,
                'nilai' => $peserta['nilai'] + $nilai,
                'waktu_pengerjaan' => $waktu_pengerjaan,
            ];
            $this->hasilTeskepribadianModel->update($peserta['id'], $value);
        } else {
            $value = [
                'nama_peserta' => $namaPeserta,
                'nilai' => $nilai,
                'waktu_pengerjaan' => $waktu_pengerjaan,
            ];
            $this->hasilTeskepribadianModel->save($value);
        }
        if (!$tesKepribadian) {
            $newdata = [
                'isSubmitTesKepribadian' => true,
            ];
            $session = session();
            $session->set($newdata);
            return redirect('pages/mahasiswa/tesKepribadian/hasilTes');
        }
        return view('/pages/mahasiswa/tesKepribadian', $data);
    }

    public function hasilTes()
    {
        $peserta = $this->hasilTeskepribadianModel->where('nama_peserta', session()->get('nama'))->first();
        $data = [
            'skor' => $peserta['nilai'],
            'waktu' => $peserta['waktu_pengerjaan'],
        ];
        return view('/pages/mahasiswa/tesKepribadian', $data);
    }
}
