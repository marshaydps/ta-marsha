<?php

namespace App\Controllers\Konselor;

use App\Controllers\BaseController;
use App\Models\kepribadianModel;
use App\Models\tulisModel;

class KelolaTesController extends BaseController
{
    protected $kepribadianModel;
    protected $tulisModel;
    //supaya kalau kelas dipanggil model otomatis terpanggil
    public function __construct()
    {
        $this->kepribadianModel = new kepribadianModel();
        $this->tulisModel = new tulisModel();
    }

    public function index()
    {
        $countSoal = $this->kepribadianModel->countAllResults() + 1;
        $twenty = $this->kepribadianModel->countAllResults();
        $data = [
            'nomor_soal' => $countSoal,
            'kepribadian' => $this->kepribadianModel->orderBy('nomor_soal', 'asc')->findAll(),
            'tulis' => $this->tulisModel->orderBy('id', 'desc')->findAll(),
            'twenty' => $twenty,
        ];
        return view('/pages/konselor/kelolaTes', $data);
    }

    public function soalkepribadianSimpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nomor_soal' => [
                'label' => 'Nomor Soal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'soal' => [
                'label' => 'soal',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'jawaban1' => [
                'label' => 'jawaban1',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'jawaban2' => [
                'label' => 'jawaban2',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'jawaban_benar' => [
                'label' => 'jawaban benar',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            if ($_FILES['gambar']['name'] != '') {
                $gambar = $this->request->getFile('gambar');
                //pindahkan file ke folder img
                $gambar->move('img');
                //ambil nama file
                $namagambar = $gambar->getName();
            } else {
                $namagambar = null;
            }

            // $id = $this->request->getPost('id');
            $nomorSoal = $this->request->getPost('nomor_soal');
            $soal = $this->request->getPost('soal');
            $jawaban1 = $this->request->getPost('jawaban1');
            $jawaban2 = $this->request->getPost('jawaban2');
            $jawaban3 = $this->request->getPost('jawaban3');
            $jawaban4 = $this->request->getPost('jawaban4');
            $jawabanBenar = $this->request->getPost('jawaban_benar');


            $data = [
                // 'id' => $id,
                'nomor_soal' => $nomorSoal,
                'gambar' => $namagambar,
                'soal' => $soal,
                'jawaban1' => $jawaban1,
                'jawaban2' => $jawaban2,
                'jawaban3' => $jawaban3,
                'jawaban4' => $jawaban4,
                'jawaban_benar' => $jawabanBenar
            ];

            $this->kepribadianModel->save($data);

            $hasil['error'] = false;
            $hasil['sukses'] = "Berhasil menambahkan soal";
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        return json_encode($hasil);
    }

    public function soalkepribadianEdit($id)
    {
        return json_encode($this->kepribadianModel->find($id));
    }

    public function soalkepribadianUpdate()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nomor_soal' => [
                'label' => 'Nomor Soal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'soal' => [
                'label' => 'soal',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'jawaban1' => [
                'label' => 'jawaban1',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'jawaban2' => [
                'label' => 'jawaban2',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],
            'jawaban_benar' => [
                'label' => 'jawaban benar',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],

        ];

        $validasi->setRules($aturan);
        $id  = $this->request->getPost('id');
        $nomorSoal = $this->request->getPost('nomor_soal');
        $soal = $this->request->getPost('soal');
        $jawaban1 = $this->request->getPost('jawaban1');
        $jawaban2 = $this->request->getPost('jawaban2');
        $jawaban3 = $this->request->getPost('jawaban3');
        $jawaban4 = $this->request->getPost('jawaban4');
        $jawabanBenar = $this->request->getPost('jawaban_benar');
        if ($validasi->withRequest($this->request)->run()) {
            if ($_FILES['gambar']['name'] != '') {
                $gambar = $this->request->getFile('gambar');
                //pindahkan file ke folder img
                $gambar->move('img');
                //ambil nama file
                $namagambar = $gambar->getName();
            } else {
                $gambar = $this->kepribadianModel->where('id', $id)->first()['gambar'];
                $namagambar = $gambar;
            }

            // $id = $this->request->getPost('id');

            $data = [
                // 'id' => $id,
                'nomor_soal' => $nomorSoal,
                'gambar' => $namagambar,
                'soal' => $soal,
                'jawaban1' => $jawaban1,
                'jawaban2' => $jawaban2,
                'jawaban3' => $jawaban3,
                'jawaban4' => $jawaban4,
                'jawaban_benar' => $jawabanBenar,
            ];

            $this->kepribadianModel->update($id, $data);

            $hasil['error'] = false;
            $hasil['sukses'] = "Berhasil mengedit soal";
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }
        return json_encode($hasil);
    }

    public function soalkepribadianHapus($id)
    {
        $this->kepribadianModel->delete($id);
        return redirect()->to('/pages/konselor/kelolaTes');
    }


    // crud tes tulis

    public function soaltulisEdit($id)
    {
        return json_encode($this->tulisModel->find($id));
    }

    public function soaltulisSimpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'gambar' => [
                'label' => 'gambar',
                'rules' => 'uploaded[gambar]',
                'errors' => [
                    'uploaded' => 'Silahkan masukkan {field}',

                ]
            ],

            'teks' => [
                'label' => 'teks',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],

        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            //ambil gambar
            $gambar = $this->request->getFile('gambar');
            //pindahkan file ke folder img
            $gambar->move('img');
            //ambil nama file
            $namagambar = $gambar->getName();

            // $id = $this->request->getPost('id');
            $teks = $this->request->getPost('teks');

            $data = [
                // 'id' => $id,
                'gambar' => $namagambar,
                'teks' => $teks,
            ];

            $this->tulisModel->save($data);

            $hasil['error'] = false;
            $hasil['sukses'] = "Berhasil menambahkan soal";
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }

    public function soaltulisUpdate()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'teks' => [
                'label' => 'teks',
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'min_length' => 'Minimum karakter untuk field {field} adalah 5 karakter'
                ]
            ],

        ];

        $validasi->setRules($aturan);
        $teks = $this->request->getPost('teks');
        $id  = $this->request->getPost('id');
        if ($validasi->withRequest($this->request)->run()) {
            if ($_FILES['gambar']['name'] != '') {
                $gambar = $this->request->getFile('gambar');
                //pindahkan file ke folder img
                $gambar->move('img');
                //ambil nama file
                $namagambar = $gambar->getName();
            } else {
                $gambar = $this->tulisModel->where('id', $id)->first()['gambar'];
                $namagambar = $gambar;
            }
            $data = [
                // 'id' => $id,
                'gambar' => $namagambar,
                'teks' => $teks,
            ];

            $this->tulisModel->update($id, $data);

            $hasil['error'] = false;
            $hasil['sukses'] = "Berhasil mengedit soal";
        } else {
            $hasil['sukses'] = false;
            $hasil['error'] = $validasi->listErrors();
        }

        return json_encode($hasil);
    }

    public function soaltulisHapus($id)
    {
        $this->tulisModel->delete($id);
        return redirect()->to('/pages/konselor/kelolaTes');
    }
}
