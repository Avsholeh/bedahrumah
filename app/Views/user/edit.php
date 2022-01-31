<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('users/update') ?>" method="POST" enctype="multipart/form-data"
                          autocomplete="off">
                        <div class="row">
                            <div class="col-6">
                                <input type="hidden" name="id" value="<?= $user->id ?>">

                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input class="form-control form-control-sm" type="text" name="nama_lengkap"
                                           value="<?= $user->nama_lengkap ?>" placeholder="Nama Lengkap" autofocus>
                                    <?php if ($error = $validation->getError('nama_lengkap')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input autocomplete="off" class="form-control form-control-sm" type="email"
                                           name="email"
                                           value="<?= $user->email ?>" placeholder="Email">
                                    <?php if ($error = $validation->getError('email')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Password <small class="text-danger">Kosongkan jika tidak
                                            diperbarui</small></label>
                                    <input autocomplete="off" class="form-control form-control-sm" type="password"
                                           name="password"
                                           value="" placeholder="Password">
                                    <?php if ($error = $validation->getError('password')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Konfirmasi Password <small class="text-danger">Kosongkan
                                            jika
                                            tidak diperbarui</small></label>
                                    <input class="form-control form-control-sm" type="password"
                                           name="password_konfirmasi"
                                           value="" placeholder="Konfirmasi Password">
                                    <?php if ($error = $validation->getError('password_konfirmasi')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Jabatan</label>
                                    <select class="form-select form-select-sm" name="jabatan">
                                        <option value="" selected disabled>Pilih jabatan</option>
                                        <option value="Admin" <?= ($user->jabatan == 'Admin') ? 'selected' : '' ?>
                                        >Admin
                                        </option>
                                        <option value="Pelapor"<?= ($user->jabatan == 'Pelapor') ? 'selected' : '' ?>
                                        >Pelapor
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('jabatan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Status</label>
                                    <select class="form-select form-select-sm" name="status">
                                        <option value="" selected disabled>Pilih status</option>
                                        <option value="1" <?= ($user->status == 1) ? 'selected' : '' ?>
                                        >Aktif
                                        </option>
                                        <option value="0" <?= ($user->status == 0) ? 'selected' : '' ?>
                                        >Tidak Aktif
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('status')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Simpan">
                    </form>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="form-label">Alamat</label>
                        <input class="form-control form-control-lg p-3" type="text" name="alamat"
                               value="<?= $user->alamat ?>" placeholder="Alamat">
                        <?php if ($error = $validation->getError('alamat')): ?>
                            <small class="text-danger"><?= $error ?></small>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label">No Telp</label>
                        <input class="form-control" type="number" name="no_telp"
                               value="<?= $user->no_telp ?>" placeholder="No Telp">
                        <?php if ($error = $validation->getError('no_telp')): ?>
                            <small class="text-danger"><?= $error ?></small>
                        <?php endif ?>
                    </div>

                    <div class="form-group">
                        <label class="form-label d-block">KTP</label>
                        <input class="form-control-sm mb-3" type="file" name="ktp" accept="image/*"
                               onchange="previewFile(this, 'ktp');">
                        <?php if (isset($user->ktp)): ?>
                            <img id="preview_ktp" width="500"
                                 src="data:image/jpeg;base64, <?= $user->ktp ?>">
                        <?php else: ?>
                            <img id="preview_ktp" width="500" style="display: none"
                                 src="<?= base_url('public/transparent.png') ?>">
                        <?php endif ?>

                        <?php if ($error = $validation->getError('ktp')): ?>
                            <br><small class="text-danger"><?= $error ?></small>
                        <?php endif ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        function previewFile(input, id) {
            var file = $(input).get(0).files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function () {
                    $("#preview_" + id).css('display', 'inline-block').attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
<?php $this->endSection() ?>