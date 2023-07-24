<?php

namespace App\Controllers\Konselor;

use App\Controllers\BaseController;
use App\Models\PengaturanTesModel;

class AturTesController extends BaseController
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
            'pengaturanTes' => $this->pengaturanTesModel->first(),
        ];
        // dd($data['pengaturanTes']['nama_tes']);
        return view('/pages/konselor/aturTes', $data);
    }

    public function simpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'waktu_pengerjaan_tes_kepribadian' => [
                'label' => 'Waktu pengerjaan tes kepribadian',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'waktu_pengerjaan_tes_tulis' => [
                'label' => 'Waktu pengerjaan tes tulis',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ];
        $validasi->setRules($aturan);
        $id = $this->request->getPost('id');
        $waktuPengerjaanTesKepribadian = $this->request->getPost('waktu_pengerjaan_tes_kepribadian');
        $waktuPengerjaanTesTulis = $this->request->getPost('waktu_pengerjaan_tes_tulis');
        if ($validasi->withRequest($this->request)->run()) {

            $data = [
                // 'id' => $id,
                'waktu_pengerjaan_tes_kepribadian' => $waktuPengerjaanTesKepribadian,
                'waktu_pengerjaan_tes_tulis' => $waktuPengerjaanTesTulis,
            ];

            if ($id) {
                $this->pengaturanTesModel->update($id, $data);
            } else {
                $this->pengaturanTesModel->save($data);
            }

            return redirect()->to('/pages/konselor/aturTes');
        } else {
            return redirect()->to('/pages/konselor/aturTes');
        }
    }
}
