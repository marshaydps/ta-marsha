<?= $this->extend('layout/appKonselor') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="position-relative">
        <div class="position-absolute w-100 bg-info d-block" style="height: 20vh;z-index: -99;">
        </div>
        <div class="px-4">
            <div class="pt-5">
                <h5 class="text-white fw-bold">Pengaturan Tes</h5>
                <div class="card mt-4 border-0 shadow rounded-3">
                    <div class="card-body">
                        <form action="<?php echo site_url("pages/konselor/aturTesSimpan") ?>" method="post">
                            <div class="col-md-6 mb-3 d-none">
                                <label class="form-label" for="id">Id</label>
                                <input type="text" class="form-control" id="id" name="id" value="<?= @$pengaturanTes['id']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="waktu_pengerjaan_tes_kepribadian">Waktu Pengerjaan Tes Kepribadian</label>
                                    <input type="number" class="form-control" id="waktu_pengerjaan_tes_kepribadian" name="waktu_pengerjaan_tes_kepribadian" value="<?= @$pengaturanTes['waktu_pengerjaan_tes_kepribadian']; ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="waktu_pengerjaan_tes_tulis">Waktu Pengerjaan Tes Tulis</label>
                                    <input type="number" class="form-control" id="waktu_pengerjaan_tes_tulis" name="waktu_pengerjaan_tes_tulis" value="<?= @$pengaturanTes['waktu_pengerjaan_tes_tulis']; ?>">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-info text-white">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
