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
<?= $this->renderSection('css') ?>
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

    <?= $this->renderSection('navbar-content') ?>
</div>
<?= $this->renderSection('content') ?>
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
<?= $this->renderSection('script') ?>
</body>
</html>
