<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Bedah Rumah</title>
    <link rel="stylesheet" href="<?= base_url('public/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/vertical-layout-light/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/vendors/simple-line-icons/css/simple-line-icons.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('public/favicon.ico') ?>">
</head>
<style>
    .navbar-bg {
        background: url("<?= base_url('public/images/bg.jpg')?>") no-repeat center;
        background-size: cover;
    }
</style>
<body>
<div class="navbar-bg mb-3 vh-100">
    <nav class="navbar bg-transparent col-lg-12 col-12 p-0 d-flex align-items-top flex-row">
        <div class="container">
            <div class="bg-transparent text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div>
                    <a class="navbar-brand brand-logo fs-4 text-center text-white" href="#">
                        <span>Bedah</span><span class="fw-bold text-warning">Rumah</span>
                    </a>
                    <a class="navbar-brand brand-logo-mini fs-4 text-center text-white" href="#">
                        <span>B</span><span class="fw-bold text-warning">R</span>
                    </a>
                </div>
            </div>
            <div class="bg-transparent navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-lg-block">
                        <a href="<?= base_url('/') ?>" class="nav-link fs-6 text-white fw-bold">Home</a>
                    </li>
                    <li class="nav-item d-lg-block">
                        <a href="<?= base_url('login') ?>" class="nav-link fs-6 fs-6 text-white">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center text-white py-5">
            <div class="col-md-6 ps-sm-5 ps-md-5 ps-lg-5">
                <h2 class="lh-sm">Sistem Informasi Pengelolaan Bedah Rumah</h2>
                <p class="py-3 lh-lg">Sistem informasi bedah rumah yang bertujuan untuk mendukung program <strong class="text-warning">Bantuan
                        Stimulan Perumahan
                        Swadaya (BSPS)</strong> pada DINAS. Sistem ini mampu mempermudah proses pengumpulan data
                    dan mempersingkat waktu dalam menentukan penerima bantuan bedah rumah.</p>
                <p>Sistem ini
                    merupakan hasil dari penelitian yang berjudul <strong class="text-warning">"Sistem Informasi Pengelolaan Bedah Rumah"</strong>
                    oleh <strong class="text-warning">Miftha Ainul Chamida</strong> di <strong class="text-warning">Universitas Muria Kudus</strong>.</p>
                <div class="mt-5">
                    <a class="btn btn-secondary" href="<?= base_url('daftar') ?>">Daftar</a>
                </div>
            </div>
            <div class="col-md-6 text-center pt-3">
                <img class="d-none d-md-block" width="80%" src="<?= base_url('public/images/home-image.png') ?>">
            </div>
        </div>
    </div>
</div>
<!--<div class="container my-5" id="jurnal">-->
<!--    <div class="row mb-3">-->
<!--        <div class="col-md-12">-->
<!--            <h2 class="text-center">Latar Belakang</h2>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row justify-content-center g-0">-->
<!--        <div class="col-md-4 p-0 d-flex justify-content-center">-->
<!--            <img src="--><?//= base_url('public/images/latar-belakang.jpg') ?><!--" width="90%">-->
<!--        </div>-->
<!--        <div class="col-md-8 p-0">-->
<!--            <p class="text-start lh-lg">-->
<!--                Salah satu masalah sosial yang diperhatikan oleh pemerintah adalah kemiskinan. Mengurangi jumlah-->
<!--                penduduk miskin menjadi tujuan utama yang harus dituntaskan baik itu oleh pemerintah pusat maupun daerah.-->
<!--                Melalui beberapa bantuan sosial, salah satunya yaitu-->
<!--                <strong>Bantuan Stimulan Perumahan Swadaya (BSPS)</strong>-->
<!--                dari pemerintah yang diperuntukkan untuk masyarakat yang memiliki rumah yang tidak layak huni.-->
<!--                Pada proses pendataan dan penyeleksian rumah penduduk yang berhak menerima bantuan ini seringkali-->
<!--                membutuhkan ketelitian yang tinggi sehingga memerlukan waktu yang cukup lama agar penyaluran bantuan-->
<!--                menjadi tepat sasaran.-->
<!--            </p>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!--<div class="container my-5">-->
<!--    <div class="row mb-3">-->
<!--        <div class="col-md-12">-->
<!--            <h2 class="text-center">Penelitian Terkait</h2>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="row justify-content-center g-0">-->
<!--        <div class="col-md-8 p-0 ">-->
<!--            <p class="text-start lh-lg">Pada penelitian sebelumnya oleh <strong>Sekar Sae Khoiruninisa</strong> yang-->
<!--                berjudul <strong>“Sistem-->
<!--                    Pendukung Keputusan Penerima-->
<!--                    Bantuan Bedah Rumah Menggunakan Metode AHP”</strong> telah dilakukan penelitian menggunakan Sistem-->
<!--                Pendukung-->
<!--                Keputusan (SPK) untuk menentukan kelayakan penerima bantuan bedah rumah. Adapun metode yang digunakan-->
<!--                adalah Analytic Hierarchy Process (AHP) Technique For Order Preference By Similarity To Ideal Positif-->
<!--                (TOPSIS). Hasil akhirnya penelitian tersebut mampu mempermudah Ikatan Pekerja Sosial Masyarakat (IPSM)-->
<!--                menentukan penerima bantuan bedah rumah yang sesuai dengan kriteria dari proses pendataan.</p>-->
<!---->
<!--            <p class="text-start lh-lg">Kemudian terdapat penelitian untuk menentukan penerima bantuan bedah rumah-->
<!--                menggunakan metode clustering-->
<!--                dengan algoritma K-Means yang berjudul <strong>“Analisis Data Mining Untuk Menentukan Kelompok Prioritas-->
<!--                    Penerima Bantuan Bedah Rumah Menggunakan Metode Clustering K-Means”</strong>. Penelitian yang-->
<!--                dilakukan oleh-->
<!--                <strong>Zainul Aras</strong> ini menggunakan kriteria status kesejahteraan, penguasaan bangunan tempat-->
<!--                tinggal, jenis-->
<!--                dinding, jenis atap, jumlah individu dan jenis lantai. Hasil dari penelitian tersebut menyebutkan bahwa-->
<!--                sistem penentuan prioritas dapat digunakan sebagai tolak ukur dalam menentukan penerima bantuan bedah-->
<!--                rumah.</p>-->
<!--        </div>-->
<!--        <div class="col-md-4 p-0 d-flex justify-content-center">-->
<!--            <img src="--><?//= base_url('public/images/penelitian-terkait.jpg') ?><!--" width="80%">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
</body>
</html>