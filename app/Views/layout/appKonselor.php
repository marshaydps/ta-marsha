<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <?= $this->renderSection('style') ?>

    <!-- ikon -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



    <!-- Font -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
        body {
            font-family: 'Poppins';
        }
    </style>
    <title>Dashboard Tes Psikologi | Konselor</title>
</head>

<body>
    <?= $this->include('layout/header') ?>
    <div class="container">
        <div id="menu-row" class="row g-0">
            <div id="sidebar" class="col-lg-3 d-none d-lg-block border-end">
                <div class="py-2 px-3">
                    <div class="d-flex align-items-center mt-3 mb-4">
                        <i class="material-icons me-2" style="font-size: 54px;">account_circle</i>
                        Konselor
                    </div>
                    <a href="/pages/konselor" class="btn btn-info text-white btn-lg w-100 mb-3">Home</a>
                    <div class="">
                        <h6 class="fw-bold">Menu</h6>
                        <a href="/pages/konselor/kelolaTes" class="d-flex text-decoration-none text-dark py-2"><i class="material-icons me-2">
                                edit
                            </i> Kelola Tes Psikologi</a>
                        <a href="/pages/konselor/aturTes" class="d-flex text-decoration-none text-dark py-2"><i class="material-icons me-2">
                                settings
                            </i> Atur Tes Psikologi</a>
                        <a href="/pages/konselor/dataTes" class="d-flex text-decoration-none text-dark py-2"><i class="material-icons me-2">
                                folder
                            </i> Data Tes Psikologi</a>
                    </div>
                </div>
            </div>
            <div id="content" class="col-lg-9 col-12">
                <div style=" min-height: 90vh;">
                    <?= $this->renderSection('content') ?>
                </div>
                <?= $this->include('layout/footer') ?>
            </div>
        </div>
    </div>
    <section id="footer" class="d-none">
        <?= $this->include('layout/footer') ?>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        function toggleMenuSidebar() {
            $('#menu-row #sidebar').toggleClass('d-lg-block');
            $('#menu-row #content').toggleClass('col-lg-9');
            $('#menu-row #content footer').toggleClass('d-none');
            $('section#footer').toggleClass('d-none');
        }
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>
