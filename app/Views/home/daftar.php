<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= isset($title) ? $title . ' - ' : ''?>Bedah Rumah</title>
    <link rel="stylesheet" href="<?= base_url('public/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/css/vertical-layout-light/style.css')?>">
    <link rel="shortcut icon" href="<?= base_url('public/favicon.ico') ?>">
</head>
<style>
    .content-wrapper {
        background: url("<?= base_url('public/images/auth/auth.jpg')?>") no-repeat center;
        background-size: cover;
    }

    .form-group > input {
        margin-bottom: 0.8rem;
    }
</style>
<body style="background-color:white">
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded-3">
                        <div class="brand-logo fs-3 text-center">
                            <span>Bedah</span><span class="fw-bold text-primary">Rumah</span>
                        </div>
                        <h4>Pendaftaran</h4>
                        <h6 class="fw-light">Silahkan isi kolom pada form dibawah.</h6>

                        <!-- FORM DAFTAR -->
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= base_url('proses_daftar') ?>" method="post" class="pt-3" autocomplete="off">
                            <?= csrf_field() ?>
                            <div class="form-group">
                                <input type="text" name="nama_lengkap" class="form-control form-control-lg"
                                       placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>" autofocus>

                                <?php if ($error = $validation->getError('nama_lengkap')): ?>
                                    <span class="text-danger"><?= $error ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-lg"
                                       placeholder="Email" value="<?= old('email') ?>">

                                <?php if ($error = $validation->getError('email')): ?>
                                    <span class="text-danger"><?= $error ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control form-control-lg"
                                       placeholder="Password" value="">

                                <?php if ($error = $validation->getError('password')): ?>
                                    <span class="text-danger"><?= $error ?></span>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <input name="password_konfirmasi" type="password" class="form-control form-control-lg"
                                       placeholder="Konfirmasi Password" value="">

                                <?php if ($error = $validation->getError('password_konfirmasi')): ?>
                                    <span class="text-danger"><?= $error ?></span>
                                <?php endif ?>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary font-weight-medium">DAFTAR</button>
                            </div>

                            <div class="text-center mt-4 fw-light">
                                Sudah punya akun? <a href="<?= base_url('login') ?>" class="text-primary">
                                    Login disini</a>
                            </div>
                            <div class="text-center mt-4 fw-light">
                                Kembali ke <a href="<?= base_url('/') ?>" class="text-primary">halaman utama</a>
                            </div>
                        </form>
                        <!-- END FORM DAFTAR -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
</body>
</html>