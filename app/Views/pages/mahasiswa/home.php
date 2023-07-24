<?= $this->extend('layout/appMahasiswa') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="position-relative">
        <div class="position-absolute w-100 bg-info d-block" style="height: 20vh;z-index: -99;">
        </div>
        <div class="px-4">
            <div class="pt-5">
                <h5 class="text-white fw-bold pb-5">Dashboard</h5>
                <div class="alert alert-light shadow" role="alert" style="border-left:4px solid red; font-size:0.8vw; text-align:center;">
                    <b>Perhatian! </b> Kerjakan keseluruhan tes untuk indentifikasi permasalahan yang lebih akurat.
                              
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 d-flex">
                        <div class="card shadow flex-grow-1">
                            <div class="card-body p-5">
                                <h5 class="card-title fw-bold mb-5">Tes Kepribadian</h5>
                                <ul class="mb-4">
                                    <li>20 Soal Pilihan</li>
                                    <li>Durasi <?= $waktu_pengerjaan_tes_kepribadian ?> Menit</li>
                                    <li>Kerjakan dengan jujur</li>
                                </ul>
                                <small><i>Tips : Cari tempat tenang untuk berkonsentrasi</i></small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card shadow flex-grow-1">
                            <div class="card-body p-5">
                                <h5 class="card-title fw-bold mb-5">Tes Tulis Tangan</h5>
                                <ul class="mb-4">
                                    <li>20 Soal Pilihan</li>
                                    <li>Wajib tulis</li>
                                    <li>Persiapkan</li>
                                    <li>Durasi <?= $waktu_pengerjaan_tes_tulis ?> Menit</li>
                                </ul>
                                <small><i>Tips : Cari tempat tenang untuk berkonsentrasi</i></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('masukanNama') ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Masukan Nama</h3>
                    <form action="/pages/mahasiswa/masukkanNama" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <button class="btn btn-info text-white w-100">Masuk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
