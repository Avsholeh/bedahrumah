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
<body>
<?= $this->renderSection('css') ?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <?= $this->renderSection('content') ?>
    </div>
</div>
<script src="<?= base_url('public/vendors/js/vendor.bundle.base.js') ?>"></script>
<?= $this->renderSection('script') ?>
</body>
</html>
