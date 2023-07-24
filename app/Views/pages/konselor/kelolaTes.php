<?= $this->extend('layout/appKonselor') ?>
<?= $this->section('style') ?>
<link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="position-relative">
        <div class="position-absolute w-100 bg-info d-block" style="height: 20vh;z-index: -99;">
        </div>
        <div class="px-4">
            <div class="pt-5">
                <div class="card rounded-3 border-0 shadow">
                    <div class="card-body">
                        <div class="row flex-row-reverse">
                            <div class="col-md-3 mb-3">
                                <?php if ($twenty < 20) : ?>
                                    <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#kepribadian">Tambah Soal</button>
                                <?php endif; ?>
                                <!-- Modal -->
                                <div class="modal fade" id="kepribadian" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="soalKepribadian" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <!-- ALERT KALAU SUCCESS-->
                                                    <div class="alert alert-success sukses" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- ALERT KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- END ALERT -->

                                                    <!-- FORM ?? -->
                                                    <div class="mb-3">
                                                        <label for="inputGambar" class="form-label">Nomor Soal</label>
                                                        <input class="form-control form-control-sm" id="inputGambar" type="number" name="nomor_soal" value="<?= $nomor_soal ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputGambar" class="form-label">Gambar</label>
                                                        <input class="form-control form-control-sm" id="inputGambar" type="file" placeholder="unggah gambar disini..." name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputSoal" class="form-label">Soal</label>
                                                        <input type="text" class="form-control" id="inputSoal" name="soal">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbA" class="form-label">Jawaban A</label>
                                                        <input type="text" class="form-control" id="inputJwbA" name="jawaban1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbB" class="form-label">Jawaban B</label>
                                                        <input type="text" class="form-control" id="inputJwbB" name="jawaban2">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbC" class="form-label">Jawaban C</label>
                                                        <input type="text" class="form-control" id="inputJwbC" name="jawaban3">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbD" class="form-label">Jawaban D</label>
                                                        <input type="text" class="form-control" id="inputJwbD" name="jawaban4">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbD" class="form-label">Jawaban Benar</label>
                                                        <select class="form-select" id="inputJwbD" name="jawaban_benar">
                                                            <option value="<?= null ?>" selected disabled>Pilih jawaban yang benar</option>
                                                            <option value="jawaban1">Jawaban A</option>
                                                            <option value="jawaban2">Jawaban B</option>
                                                            <option value="jawaban3">Jawaban C</option>
                                                            <option value="jawaban4">Jawaban D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="kepribadianEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="editSoalKepribadian" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <!-- ALERT KALAU SUCCESS-->
                                                    <div class="alert alert-success sukses" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- ALERT KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- END ALERT -->

                                                    <!-- FORM ?? -->
                                                    <div class="mb-3 d-none">
                                                        <label for="inputId" class="form-label">Id</label>
                                                        <input type="text" class="form-control" id="inputId" name="id">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputNomorSoal" class="form-label">Nomor Soal</label>
                                                        <input class="form-control form-control-sm" id="inputNomorSoal" type="number" name="nomor_soal">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputGambar" class="form-label">Gambar</label>
                                                        <input class="form-control form-control-sm" id="inputGambar" type="file" placeholder="unggah gambar disini..." name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputSoal" class="form-label">Soal</label>
                                                        <input type="text" class="form-control" id="inputSoal" name="soal">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbA" class="form-label">Jawaban A</label>
                                                        <input type="text" class="form-control" id="inputJwbA" name="jawaban1">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbB" class="form-label">Jawaban B</label>
                                                        <input type="text" class="form-control" id="inputJwbB" name="jawaban2">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbC" class="form-label">Jawaban C</label>
                                                        <input type="text" class="form-control" id="inputJwbC" name="jawaban3">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbD" class="form-label">Jawaban D</label>
                                                        <input type="text" class="form-control" id="inputJwbD" name="jawaban4">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputJwbD" class="form-label">Jawaban Benar</label>
                                                        <select class="form-select" id="inputJwbD" name="jawaban_benar">
                                                            <option value="<?= null ?>" selected disabled>Pilih jawaban yang benar</option>
                                                            <option value="jawaban1">Jawaban A</option>
                                                            <option value="jawaban2">Jawaban B</option>
                                                            <option value="jawaban3">Jawaban C</option>
                                                            <option value="jawaban4">Jawaban D</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-1 table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Soal</th>
                                                <th>Jawaban 1</th>
                                                <th>Jawaban 2</th>
                                                <th>Jawaban 3</th>
                                                <th>Jawaban 4</th>
                                                <th>#</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kepribadian as $k) : ?>
                                                <tr>
                                                    <td><?= $k['nomor_soal']; ?></td>
                                                    <td><img src="/img/<?= $k['gambar']; ?>" alt="" class="w-100"></td>
                                                    <td><?= $k['soal']; ?></td>
                                                    <td><?= $k['jawaban1']; ?></td>
                                                    <td><?= $k['jawaban2']; ?></td>
                                                    <td><?= $k['jawaban3']; ?></td>
                                                    <td><?= $k['jawaban4']; ?></td>

                                                    <td><button type="button" class="btn btn-warning text" onclick="editKepribadian(<?php echo $k['id'] ?>)">Edit</button></td>

                                                    <td><button type="button" class="btn btn-danger text" onclick="hapus('soalkepribadianHapus',<?php echo $k['id'] ?>)">Hapus</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row flex-row-reverse mt-5">
                            <div class="col-md-3 mb-3">
                                <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#tulis">Tambah Soal</button>
                                <!-- Modal -->
                                <div class="modal fade" id="tulis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Soal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="soalTulis" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <!-- ALERT KALAU SUCCESS-->
                                                    <div class="alert alert-success sukses" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- ALERT KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- END ALERT -->

                                                    <!-- FORM ?? -->
                                                    <div class="mb-3">
                                                        <label for="inputGambar" class="form-label">Gambar</label>
                                                        <input class="form-control form-control-sm" id="inputGambar" type="file" placeholder="unggah gambar disini..." name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputSoal" class="form-label">Teks</label>
                                                        <textarea type="text" class="form-control" id="inputSoal" name="teks"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="tulisEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Soal</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form id="editSoalTulis" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <!-- ALERT KALAU SUCCESS-->
                                                    <div class="alert alert-success sukses" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- ALERT KALAU ERROR -->
                                                    <div class="alert alert-danger error" role="alert" style="display:none;">
                                                    </div>
                                                    <!-- END ALERT -->

                                                    <!-- FORM ?? -->
                                                    <div class="mb-3 d-none">
                                                        <label for="inputId" class="form-label">Id</label>
                                                        <input type="text" class="form-control" id="inputId" name="id">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputGambar" class="form-label">Gambar</label>
                                                        <input class="form-control form-control-sm" id="inputGambar" type="file" placeholder="unggah gambar disini..." name="gambar">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="inputTeks" class="form-label">Teks</label>
                                                        <textarea type="text" class="form-control" id="inputTeks" name="teks"></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="table-responsive">
                                    <table class="table table-2 table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Gambar</th>
                                                <th>Teks</th>
                                                <th>#</th>
                                                <th>#</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($tulis as $t) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++; ?></th>
                                                    <td><img src="/img/<?= $t['gambar']; ?>" alt="" class="w-50"></td>
                                                    <td><?= $t['teks']; ?></td>

                                                    <td><button type="button" class="btn btn-warning text" onclick="editTulis(<?php echo $t['id'] ?>)">Edit</button></td>

                                                    <td><button type="button" class="btn btn-danger text" onclick="hapus('soaltulisHapus',<?php echo $t['id'] ?>)">Hapus</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hapusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <h6 class="fw-bold">Apakah anda yakin ingin menghapus?</h6>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="konfirmasi py-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('.table-1', {
        "dom": 'frtp',
        "pageLength": 3,
        "ordering": false,
    });
    new DataTable('.table-2', {
        "dom": 'frtp',
        "pageLength": 3,
        "ordering": false,
    });
    //id pakai # , class pakai .
    function hapus($route, $id) {
        $('#hapusModal').modal('show');
        var url = "<?php echo site_url() ?>" + '/pages/konselor/' + $route + '/' + $id;
        var button = "<a href='" + url + "' class='btn btn-danger w-100'>Ya</a><button type='button' class='btn btn-secondary w-100 mt-4' data-bs-dismiss='modal'>Close</button>";
        $('#hapusModal').find('.konfirmasi').html(button);
    }

    function editKepribadian($id) {
        $.ajax({
            url: "<?php echo site_url("pages/konselor/soalkepribadianEdit") ?>/" + $id,
            type: "get",
            success: function(hasil) {
                $('#kepribadianEdit').modal('show');
                var $obj = $.parseJSON(hasil);
                if ($obj.id != '') {
                    // $('#editSoalKepribadian').find('#inputGambar').val($obj.gambar);
                    $('#editSoalKepribadian').find('#inputNomorSoal').val($obj.nomor_soal);
                    $('#editSoalKepribadian').find('#inputId').val($obj.id);
                    $('#editSoalKepribadian').find('#inputSoal').val($obj.soal);
                    $('#editSoalKepribadian').find('#inputJwbA').val($obj.jawaban1);
                    $('#editSoalKepribadian').find('#inputJwbB').val($obj.jawaban2);
                    $('#editSoalKepribadian').find('#inputJwbC').val($obj.jawaban3);
                    $('#editSoalKepribadian').find('#inputJwbD').val($obj.jawaban4);
                }
            }
        });
    }

    function editTulis($id) {
        $.ajax({
            url: "<?php echo site_url("pages/konselor/soaltulisEdit") ?>/" + $id,
            type: "get",
            success: function(hasil) {
                $('#tulisEdit').modal('show');
                var $obj = $.parseJSON(hasil);
                if ($obj.id != '') {
                    // $('#editSoalKepribadian').find('#inputGambar').val($obj.gambar);
                    $('#editSoalTulis').find('#inputId').val($obj.id);
                    $('#editSoalTulis').find('#inputTeks').val($obj.teks);
                }
            }
        });
    }


    $('#soalKepribadian').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url("pages/konselor/soalkepribadianSimpan") ?>",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(hasil) {
                if (hasil.sukses == false) {
                    $('#soalKepribadian').find('.sukses').hide();
                    $('#soalKepribadian').find('.error').show();
                    $('#soalKepribadian').find('.error').html(hasil.error);
                }
                if (hasil.error == false) {
                    $('#soalKepribadian').find('.eror').hide();
                    $('#soalKepribadian').find('.sukses').show();
                    $('#soalKepribadian').find('.sukses').html(hasil.sukses);
                    location.reload();
                }
            }
        });
    });

    $('#editSoalKepribadian').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url("pages/konselor/soalkepribadianUpdate") ?>",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(hasil) {
                if (hasil.sukses == false) {
                    $('#editSoalKepribadian').find('.sukses').hide();
                    $('#editSoalKepribadian').find('.error').show();
                    $('#editSoalKepribadian').find('.error').html(hasil.error);
                }
                if (hasil.error == false) {
                    $('#editSoalKepribadian').find('.eror').hide();
                    $('#editSoalKepribadian').find('.sukses').show();
                    $('#editSoalKepribadian').find('.sukses').html(hasil.sukses);
                    location.reload();
                }
            }
        });
    });


    $('#soalTulis').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url("pages/konselor/soaltulisSimpan") ?>",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(hasil) {
                if (hasil.sukses == false) {
                    $('#soalTulis').find('.sukses').hide();
                    $('#soalTulis').find('.error').html(hasil.error);
                    $('#soalTulis').find('.error').show();
                } else {
                    $('#soalTulis').find('.sukses').show();
                    $('#soalTulis').find('.sukses').html(hasil.sukses);
                    $('#soalTulis').find('.eror').hide();
                    location.reload();
                }
            }
        });
    });
    $('#editSoalTulis').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo site_url("pages/konselor/soaltulisUpdate") ?>",
            method: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            dataType: "json",
            success: function(hasil) {
                if (hasil.sukses == false) {
                    $('#editSoalTulis').find('.sukses').hide();
                    $('#editSoalTulis').find('.error').html(hasil.error);
                    $('#editSoalTulis').find('.error').show();
                } else {
                    $('#editSoalTulis').find('.sukses').show();
                    $('#editSoalTulis').find('.sukses').html(hasil.sukses);
                    $('#editSoalTulis').find('.eror').hide();
                    location.reload();
                }
            }
        });
    });
</script>
<?= $this->endSection() ?>
