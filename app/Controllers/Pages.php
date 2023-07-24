<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function home()
    {
        return view('pages/home');
    }

    // MAHASISWA SECTION

    public function dbMahasiswa()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/dbMahasiswa');
        echo view('layout/footer');
    }

    public function riwayatTes()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/riwayatTes');
        echo view('layout/footer');
    }

    public function tesKepribadian()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/tesKepribadian');
        echo view('layout/footer');
    }

    public function tesTulis()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/tesTulis');
        echo view('layout/footer');
    }

    public function welcomeTulis()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/welcomeTulis');
        echo view('layout/footer');
    }

    public function welcomeKepribadian()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/welcomeKepribadian');
        echo view('layout/footer');
    }

    public function skorTes()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/skorTes');
        echo view('layout/footer');
    }

    public function berhasilKirim()
    {
        echo view('layout/header');
        echo view('pages/mahasiswa/berhasilKirim');
        echo view('layout/footer');
    }


    // KONSELOR SECTION

    public function dbKonselor()
    {
        echo view('layout/header');
        echo view('pages/konselor/dbKonselor');
        echo view('layout/footer');
    }

    public function aturTes()
    {
        echo view('layout/header');
        echo view('pages/konselor/aturTes');
        echo view('layout/footer');
    }

    public function dataTes()
    {
        echo view('layout/header');
        echo view('pages/konselor/dataTes');
        echo view('layout/footer');
    }

    public function pratinjauSoal()
    {
        echo view('layout/header');
        echo view('pages/konselor/pratinjauSoal');
        echo view('layout/footer');
    }
}
