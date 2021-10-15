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
                <form class="pt-3" autocomplete="off">
                    <div class="form-group">
                        <input type="email" class="form-control form-control-lg" id="exampleInputEmail1"
                               placeholder="Email" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1"
                               placeholder="Password">
                    </div>
                    <div class="mt-3">
                        <a class="btn btn-block btn-primary font-weight-medium"
                           href="<?= base_url('dashboard')?>">LOGIN</a>
                    </div>
                    <div class="text-center mt-4 fw-light">
                        Belum punya akun? <a href="<?= base_url('home/daftar') ?>" class="text-primary">Daftar disini</a>
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
