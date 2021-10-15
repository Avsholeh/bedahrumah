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
<div class="navbar-bg mb-3">
    <?= $this->include('layouts/guest-navbar') ?>
    <?= $this->renderSection('navbar-content') ?>
</div>
<?= $this->renderSection('content') ?>
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
<?= $this->renderSection('script') ?>
</body>
</html>
