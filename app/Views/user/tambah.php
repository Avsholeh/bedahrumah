<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-6">
                        <?php $validation = \Config\Services::validation(); ?>
                        <form action="<?= base_url('users/simpan') ?>" method="POST" enctype="multipart/form-data"
                              autocomplete="off">

                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <input class="form-control form-control-sm" type="text" name="nama_lengkap"
                                       value="<?= old('nama_lengkap') ?>" placeholder="Nama Lengkap" autofocus>
                                <?php if ($error = $validation->getError('nama_lengkap')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <input autocomplete="off" class="form-control form-control-sm" type="email" name="email"
                                       value="<?= old('email') ?>" placeholder="Email" >
                                <?php if ($error = $validation->getError('email')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <input autocomplete="off" class="form-control form-control-sm" type="password" name="password"
                                       value="<?= old('password') ?>" placeholder="Password">
                                <?php if ($error = $validation->getError('password')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Konfirmasi Password</label>
                                <input class="form-control form-control-sm" type="password" name="password_konfirmasi"
                                       value="<?= old('password_konfirmasi') ?>" placeholder="Konfirmasi Password">
                                <?php if ($error = $validation->getError('password_konfirmasi')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Jabatan</label>
                                <select class="form-select form-select-sm" name="jabatan">
                                    <option value="" selected disabled>Pilih jabatan</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Pelapor">Pelapor</option>
                                </select>
                                <?php if ($error = $validation->getError('jabatan')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select class="form-select form-select-sm" name="status">
                                    <option value="" selected disabled>Pilih status</option>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                                <?php if ($error = $validation->getError('status')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <input class="btn btn-primary" type="submit" value="Simpan">

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
