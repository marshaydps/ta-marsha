<?= $this->extend('layout/appMahasiswa') ?>

<?= $this->section('content') ?>
<div class="container">
    <?php if (session()->get('isSubmitTesKepribadian')) : ?>
        <div style="min-height: 90vh;" class=" mx-0 bg-info row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header bg-white border-0">
                        <h5 class="card-title fw-bold">Skor Tes Psikologi Anda :</h5>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-semibold" style="font-size: 60px;"><?= $skor ?></h5>
                        <p>Untuk melanjutkan ke tes berikutnya, klik tombol di bawah ini : </p>
                        <a href="/pages/mahasiswa/tesTulis" class="btn btn-info text-white">Tes Tulis Tangan</a>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif (session()->get('isReadyTesKepribadian')) : ?>
        <div class="position-relative">
            <div class="position-absolute w-100 bg-info d-block" style="height: 20vh;z-index: -99;">
            </div>
            <div class="px-4">
                <div class="pt-5">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="text-white fw-bold mb-0">Tes Tulis Kepribadian</h5>
                            <p class="card-text text-white">Jangan lupa untuk jawab dengan jujur dan perhatikan waktu pengerjaan!</p>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold mb-0">Sisa Waktu :</h5>
                            <p class="card-text text-white" id="timer"></p>
                        </div>
                    </div>
                    <div class="card mt-4 border-0 shadow">
                        <div class="card-body">
                            <h6 class="card-title fw-bold">Soal <?= $tesKepribadian['nomor_soal']; ?></h6>
                            <img src="/img/<?= @$tesKepribadian['gambar']; ?>" alt="" class="w-25 mb-2">
                            <h6 class="card-title fw-bold ms-3">Soal <?= $tesKepribadian['soal']; ?></h6>
                            <form action="/pages/mahasiswa/tesKepribadian/nextSoal" method="post" enctype="multipart/form-data">
                                <div class="ms-5 pt-2">
                                    <?php if ($tesKepribadian['jawaban1']) : ?>
                                        <div class="form-check py-2">
                                            <input class="form-check-input" type="radio" name="jawaban" id="<?= $tesKepribadian['jawaban1']; ?>" value="jawaban1">
                                            <label class="form-check-label" for="<?= $tesKepribadian['jawaban1']; ?>">
                                                <?= $tesKepribadian['jawaban1']; ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($tesKepribadian['jawaban2']) : ?>
                                        <div class="form-check py-2">
                                            <input class="form-check-input" type="radio" name="jawaban" id="<?= $tesKepribadian['jawaban2']; ?>" value="jawaban2">
                                            <label class="form-check-label" for="<?= $tesKepribadian['jawaban2']; ?>">
                                                <?= $tesKepribadian['jawaban2']; ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($tesKepribadian['jawaban3']) : ?>
                                        <div class="form-check py-2">
                                            <input class="form-check-input" type="radio" name="jawaban" id="<?= $tesKepribadian['jawaban3']; ?>" value="jawaban3">
                                            <label class="form-check-label" for="<?= $tesKepribadian['jawaban3']; ?>">
                                                <?= $tesKepribadian['jawaban3']; ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($tesKepribadian['jawaban4']) : ?>
                                        <div class="form-check py-2">
                                            <input class="form-check-input" type="radio" name="jawaban" id="<?= $tesKepribadian['jawaban4']; ?>" value="jawaban4">
                                            <label class="form-check-label" for="<?= $tesKepribadian['jawaban4']; ?>">
                                                <?= $tesKepribadian['jawaban4']; ?>
                                            </label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <input type="hidden" name="waktu_pengerjaan" id="waktu_pengerjaan">
                                    <input type="hidden" name="id_soal" id="id_soal" value="<?= $tesKepribadian['id']; ?>">
                                    <input type="hidden" name="nomor_soal" id="nomor_soal" value="<?= $tesKepribadian['nomor_soal']; ?>">
                                    <input type="hidden" name="menit" id="menit">
                                    <input type="hidden" name="detik" id="detik">
                                    <input type="hidden" name="nama_peserta" value="<?= session()->get('nama'); ?>">
                                    <div class="d-flex justify-content-end">
                                        <button class="btn btn-info text-white">Selanjutnya</button>
                                    </div>
                                    <!-- <button class="btn btn-info text-white">Selanjutnya</button> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div style="min-height: 90vh;" class=" mx-0 bg-info row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="card py-5">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Selamat datang di Tes Kepribadian!</h5>
                        <p>jika anda sudah siap, klik tombol di bawah ini untuk mulai.</p>
                        <a href="/pages/mahasiswa/tesKepribadian/siap" class="btn btn-info text-white">Tes Kepribadian</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
    var sec = <?= $waktu ?>,
        countDiv = document.getElementById("timer"),
        secpass,
        countDown = setInterval(function() {
            'use strict';

            secpass();
        }, 1000);

    function secpass() {
        'use strict';

        var min = Math.floor(sec / 60),
            remSec = sec % 60;

        if (remSec < 10) {

            remSec = '0' + remSec;

        }
        if (min < 10) {

            min = '0' + min;

        }
        countDiv.innerHTML = min + ":" + remSec;

        $('#waktu_pengerjaan').val(min);
        $('#menit').val(min);
        $('#detik').val(remSec);

        if (sec > 0) {

            sec = sec - 1;

        } else {

            clearInterval(countDown);

            countDiv.innerHTML = 'countdown done';

        }
    }
</script>
<?= $this->endSection() ?>
