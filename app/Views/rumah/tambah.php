<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start mb-3">
                <div>
                    <h4 class="card-title card-title-dash">Data Rumah</h4>
                    <p class="card-subtitle card-subtitle-dash">Silahkan isi form data rumah dibawah ini</p>
                </div>
            </div>

            <!-- buat mekanisme validasi input -->
            <?php $validation = \Config\Services::validation(); ?>
            <form action="<?= base_url('rumah/simpan') ?>" method="POST" enctype="multipart/form-data"
                  autocomplete="off">
                <div class="row">
                    <div class="col-4">

                    </div>
                </div>

                <input class="btn btn-primary mt-3" type="submit" value="Simpan">

            </form>
        </div>
    </div>

<?php $this->endSection() ?>