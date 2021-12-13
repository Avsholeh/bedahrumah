<?= $this->extend('layouts/auth') ?>

<?= $this->section('css') ?>
<style>
    .content-wrapper {
        background: url("<?= base_url('public/images/auth/auth.jpg')?>") no-repeat center;
        background-size: cover;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="content-wrapper d-flex align-items-center auth px-0">
    <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 rounded-3">
                <div class="brand-logo fs-3 text-center">
                    <span>Bedah</span><span class="fw-bolder text-primary">Rumah</span>
                </div>
                <h4>Portal Masuk</h4>
                <h6 class="fw-light">Silahkan login untuk masuk ke sistem.</h6>

                <?php if (session('error_message')): ?>
                    <div class="alert alert-danger mb-0"><?= session('error_message') ?></div>
                <?php endif ?>

                <?php $validation = \Config\Services::validation(); ?>

                <form action="<?= base_url('proses_login') ?>" method="post" class="pt-3" autocomplete="off">

                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-lg mb-3"
                               placeholder="Email" value="<?= old('email') ?>" autofocus>

                        <?php if ($error = $validation->getError('email')): ?>
                            <span class="text-danger"><?= $error ?></span>
                        <?php endif ?>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-lg mb-3"
                               placeholder="Password">

                        <?php if ($error = $validation->getError('password')): ?>
                            <span class="text-danger"><?= $error ?></span>
                        <?php endif ?>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-block btn-primary font-weight-medium">LOGIN</button>
                    </div>
                    <div class="text-center mt-4 fw-light">
                        Belum punya akun? <a href="<?= base_url('daftar') ?>" class="text-primary">Daftar disini</a>
                    </div>
                    <div class="text-center mt-4 fw-light">
                        Kembali ke <a href="<?= base_url('home') ?>" class="text-primary">halaman utama</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- content-wrapper ends -->
<?= $this->endSection() ?>
