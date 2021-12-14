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
<body>
<div class="container-scroller">
    <?= $this->include('layouts/navbar') ?>
    <div class="container-fluid page-body-wrapper">
        <?= $this->include('layouts/sidebar') ?>
        <div class="main-panel">
            <div class="content-wrapper">
                <?= $this->renderSection('content') ?>
            </div>
            <?= $this->include('layouts/footer') ?>
        </div>
    </div>
</div>
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
<!--<script src="--><?//= base_url('public/js/off-canvas.js')?><!--"></script>-->
<!--<script src="--><?//= base_url('public/js/dashboard.js')?><!--"></script>-->
<!--<script src="--><?//= base_url('public/js/template.js')?><!--"></script>-->
</body>
</html>
