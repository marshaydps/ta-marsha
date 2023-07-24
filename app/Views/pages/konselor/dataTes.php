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
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-1 table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Waktu Pengerjaan</th>
                                                <th>Skor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($kepribadian as $k) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $k['nama_peserta']; ?></td>
                                                    <td><?= $k['waktu_pengerjaan']; ?> menit</td>
                                                    <td><?= $k['nilai']; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="row flex-row-reverse mt-5">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-2 table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Waktu Pengerjaan</th>
                                                <th>File</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($tulis as $t) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i++ ?></th>
                                                    <td><?= $t['nama_peserta']; ?></td>
                                                    <td><?= $t['waktu_pengerjaan']; ?> menit</td>
                                                    <td>
                                                        <a href="/pages/mahasiswa/riwayatTes/download/<?= $t['id']; ?>"><?= $t['filejawaban']; ?></a>
                                                    </td>
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
        var url = "<?php echo site_url() ?>" + '/' + $route + '/hapus/' + $id;
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
            url: "<?php echo site_url("Tulis/edit") ?>/" + $id,
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
            url: "<?php echo site_url("Kepribadian/update") ?>",
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
            url: "<?php echo site_url("Tulis/simpan") ?>",
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
            url: "<?php echo site_url("Tulis/update") ?>",
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
