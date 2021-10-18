<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-primary card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Calon Penerima</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white">10</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-warning card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Lolos Seleksi</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white">8</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-danger card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Pengguna</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white">1999</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>