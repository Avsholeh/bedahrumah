<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-primary card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Jumlah Pengaju</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white"><?= $jumlahPengaju ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-warning card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Belum Verifikasi</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white"><?= $belumVerifikasi ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-danger card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Sudah Verifikasi</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white"><?= $sudahVerifikasi ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>