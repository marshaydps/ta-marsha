<?= $this->extend('layout/appMahasiswa') ?>

<?= $this->section('content') ?>
<div class="container">
    <?php if (session()->get('isSubmitTesTulis')) : ?>
        <div style="min-height: 90vh;" class=" mx-0 bg-info row align-items-center justify-content-center">
            <div class="col-md-7">
                <div class="card py-5">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">Selamat! Jawaban anda sudah terkirim</h5>
                    </div>
                </div>
            </div>
        </div>
    <?php elseif (session()->get('isReadyTesTulis')) : ?>
        <div class="position-relative">
            <div class="position-absolute w-100 bg-info d-block" style="height: 20vh;z-index: -99;">
            </div>
            <div class="px-4">
                <div class="pt-5">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="text-white fw-bold mb-0">Tes Tulis Tangan</h5>
                            <p class="card-text text-white">Jangan lupa untuk jawab dengan jujur dan perhatikan waktu pengerjaan!</p>
                        </div>
                        <div>
                            <h5 class="text-white fw-bold mb-0">Sisa Waktu :</h5>
                            <p class="card-text text-white" id="timer"></p>
                        </div>
                    </div>
                    <div class="card my-4 border-0 shadow">
                        <div class="card-body">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <img src="/img/<?= @$tesTulis['gambar']; ?>" alt="" class="w-75 d-block">
                                    <?= @$tesTulis['teks']; ?>
                                </div>
                            </div>
                            <form action="/pages/mahasiswa/tesTulis/kirimJawaban" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="tulis_id" value="<?= @$tesTulis['id']; ?>">
                                <input type="hidden" name="waktu_pengerjaan" id="waktu_pengerjaan">
                                <input type="hidden" name="nama_peserta" value="<?= session()->get('nama'); ?>">
                                <input type="file" name="filejawaban" id="filejawaban" class="form-control mb-3" required>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-info text-white">Kirim Jawaban</button>
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
                        <h5 class="card-title fw-bold">Selamat datang di Tes Tulis Tangan!</h5>
                        <p>jika anda sudah siap, klik tombol di bawah ini untuk mulai.</p>
                        <a href="/pages/mahasiswa/tesTulis/siap" class="btn btn-info text-white">Tes Tulis Tangan</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script>
    var sec = <?= $waktu ?> * 60,
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

        if (sec > 0) {

            sec = sec - 1;

        } else {

            clearInterval(countDown);

            countDiv.innerHTML = 'countdown done';

        }
    }
</script>
<?= $this->endSection() ?>
