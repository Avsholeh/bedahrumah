<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('permohonan/simpan') ?>" method="POST" enctype="multipart/form-data"
                      autocomplete="off">

                    <!-- Data Pengaju -->
                    <div class="d-sm-flex justify-content-between align-items-start mb-3">
                        <div>
                            <span class="badge badge-primary me-2">1</span>
                            <h4 class="d-inline card-title card-title-dash">Informasi Pengaju</h4>
                            <p class="card-subtitle card-subtitle-dash">Silahkan isi form informasi pengaju dibawah
                                ini</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nama Pengaju</label>
                                <input class="form-control form-control-sm" type="text" name="nama"
                                       value="<?= old('nama') ?>" placeholder="Nama Pengaju" autofocus>
                                <?php if ($error = $validation->getError('nama')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">No KTP</label>
                                <input class="form-control form-control-sm" type="number" name="no_ktp"
                                       value="<?= old('no_ktp') ?>" placeholder="No KTP">
                                <?php if ($error = $validation->getError('no_ktp')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">No KK</label>
                                <input class="form-control form-control-sm" type="number" name="no_kk"
                                       value="<?= old('no_kk') ?>" placeholder="No KK">
                                <?php if ($error = $validation->getError('no_kk')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tempat Lahir</label>
                                <input class="form-control form-control-sm" type="text" name="tempat_lahir"
                                       value="<?= old('tempat_lahir') ?>" placeholder="Tempat Lahir">
                                <?php if ($error = $validation->getError('tempat_lahir')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input class="form-control form-control-sm" type="date" name="tgl_lahir"
                                       value="<?= old('tgl_lahir') ?>">
                                <?php if ($error = $validation->getError('tgl_lahir')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select form-select-sm" name="jenis_kelamin">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>
                                            value="Laki-laki">Laki-laki
                                    </option>
                                    <option <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>
                                            value="Perempuan">Perempuan
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('jenis_kelamin')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <input class="form-control form-control-lg p-3" type="text" name="alamat"
                                       value="<?= old('alamat') ?>" placeholder="Alamat">
                                <?php if ($error = $validation->getError('alamat')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Penghasilan Perbulan</label>
                                <select class="form-select form-select-sm" name="penghasilan">
                                    <option value="" selected disabled>Pilih Penghasilan</option>
                                    <option <?= old('penghasilan') == '> 2,6jt' ? 'selected' : '' ?>
                                            value="> 2,6jt">> 2,6 juta
                                    </option>
                                    <option <?= old('penghasilan') == '1,2 juta - 1,8 juta' ? 'selected' : '' ?>
                                            value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta
                                    </option>
                                    <option <?= old('penghasilan') == '2,1 juta - 2,6 juta' ? 'selected' : '' ?>
                                            value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta
                                    </option>
                                    <option <?= old('penghasilan') == '< 1,2 juta' ? 'selected' : '' ?>
                                            value="< 1,2 juta">< 1,2 juta
                                    </option>
                                    <option <?= old('penghasilan') == '1,8 juta - 2,1 juta' ? 'selected' : '' ?>
                                            value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('penghasilan')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Pengeluaran Perbulan</label>
                                <select class="form-select form-select-sm" name="pengeluaran">
                                    <option value="" selected disabled>Pilih Pengeluaran</option>
                                    <option <?= old('pengeluaran') == '> 2,6jt' ? 'selected' : '' ?>
                                            value="> 2,6jt">> 2,6 juta
                                    </option>
                                    <option <?= old('pengeluaran') == '1,2 juta - 1,8 juta' ? 'selected' : '' ?>
                                            value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta
                                    </option>
                                    <option <?= old('pengeluaran') == '2,1 juta - 2,6 juta' ? 'selected' : '' ?>
                                            value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta
                                    </option>
                                    <option <?= old('pengeluaran') == '< 1,2 juta' ? 'selected' : '' ?>
                                            value="< 1,2 juta">< 1,2 juta
                                    </option>
                                    <option <?= old('pengeluaran') == '1,8 juta - 2,1 juta' ? 'selected' : '' ?>
                                            value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('pengeluaran')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Status Kepemilikan Tanah</label>
                                <select class="form-select form-select-sm" name="status_pemilik_tanah">
                                    <option value="" selected disabled>Pilih Status Kepemilikan Tanah</option>
                                    <option <?= old('status_pemilik_tanah') == 'Milik Sendiri' ? 'selected' : '' ?>
                                            value="Milik Sendiri">Milik Sendiri
                                    </option>
                                    <option <?= old('status_pemilik_tanah') == 'Bukan Milik Sendiri' ? 'selected' : '' ?>
                                            value="Bukan Milik Sendiri">Bukan Milik Sendiri
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('status_pemilik_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Bukti Kepemilikan Tanah</label>
                                <select class="form-select form-select-sm" name="bukti_pemilik_tanah">
                                    <option value="" selected disabled>Pilih Bukti Kepemilikan Tanah</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Hak Milik">Hak Milik
                                    </option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Girik / Letter C">Girik / Letter C
                                    </option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="HGB">HGB
                                    </option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Surat Keterangan Lainnya">Surat Keterangan Lainnya
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('bukti_pemilik_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Status Kepemilikan Rumah</label>
                                <select class="form-select form-select-sm" name="status_pemilik_rumah">
                                    <option value="" selected disabled>Pilih Status Kepemilikan Rumah</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Milik Sendiri">Milik Sendiri
                                    </option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Bukan Milik Sendiri">Bukan Milik Sendiri
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('status_pemilik_rumah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Aset Rumah Ditempat Lain</label>
                                <select class="form-select form-select-sm" name="aset_rumah">
                                    <option value="" selected disabled>Pilih Aset Rumah Ditempat Lain</option>
                                    <option <?= old('aset_rumah') == 'Ada' ? 'selected' : '' ?>
                                            value="Ada">Ada
                                    </option>
                                    <option <?= old('aset_rumah') == 'Tidak Ada' ? 'selected' : '' ?>
                                            value="Tidak Ada">Tidak Ada
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('aset_rumah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Aset Tanah Ditempat Lain</label>
                                <select class="form-select form-select-sm" name="aset_tanah">
                                    <option value="" selected disabled>Pilih Aset Tanah Ditempat Lain</option>
                                    <option <?= old('aset_tanah') == 'Ada' ? 'selected' : '' ?>
                                            value="Ada">Ada
                                    </option>
                                    <option <?= old('aset_tanah') == 'Tidak Ada' ? 'selected' : '' ?>
                                            value="Tidak Ada">Tidak Ada
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('aset_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Data Rumah -->
                    <div class="d-sm-flex justify-content-between align-items-start my-3">
                        <div>
                            <span class="badge badge-primary me-2">2</span>
                            <h4 class="d-inline card-title card-title-dash">Informasi Seleksi</h4>
                            <p class="card-subtitle card-subtitle-dash">Silahkan isi form informasi seleksi dibawah
                                ini</p>
                        </div>
                    </div>

                    <div class="row">
                        <?php foreach ($indikators as $indikator): ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label"><?= $indikator['indikator'] ?></label>
                                    <select class="form-select form-select-sm"
                                            name="<?= strtolower(str_replace(" ", "_", $indikator['indikator'])) ?>">
                                        <option value="" selected disabled>Pilih <?= $indikator['indikator'] ?></option>
                                        <?php foreach (array_filter($atribut, function ($value) use ($indikator) {
                                            return $value['id_indikator'] == $indikator['id'];
                                        }) as $item): ?>
                                            <option value="<?= $item['bobot'] ?>|<?= $item['atribut'] ?>"><?= $item['atribut'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if ($error = $validation->getError(strtolower(str_replace(" ", "_", $indikator['indikator'])))): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <hr>

                    <!-- Data Gambar -->
                    <div class="d-sm-flex justify-content-between align-items-start my-3">
                        <div>
                            <span class="badge badge-primary me-2">2</span>
                            <h4 class="d-inline card-title card-title-dash">Foto Rumah</h4>
                            <p class="card-subtitle card-subtitle-dash">
                                Silahkan isi form foto rumah dibawah ini.
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Tampak Depan</label>
                                <input class="form-control-sm" type="file" name="gambar_depan" accept="image/*"
                                       onchange="previewFile(this, 'gambar_depan');">
                                <img id="preview_gambar_depan" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Tampak Samping</label>
                                <input class="form-control-sm" type="file" name="gambar_samping" accept="image/*"
                                       onchange="previewFile(this, 'gambar_samping');">
                                <img id="preview_gambar_samping" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Tampak Belakang</label>
                                <input class="form-control-sm" type="file" name="gambar_belakang" accept="image/*"
                                       onchange="previewFile(this, 'gambar_belakang');">
                                <img id="preview_gambar_belakang" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Bagian Dalam</label>
                                <input class="form-control-sm" type="file" name="gambar_dalam" accept="image/*"
                                       onchange="previewFile(this, 'gambar_dalam');">
                                <img id="preview_gambar_dalam" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Foto Lantai</label>
                                <input class="form-control-sm" type="file" name="foto_lantai" accept="image/*"
                                       onchange="previewFile(this, 'foto_lantai');">
                                <img id="preview_foto_lantai" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Foto Dinding</label>
                                <input class="form-control-sm" type="file" name="foto_dinding" accept="image/*"
                                       onchange="previewFile(this, 'foto_dinding');">
                                <img id="preview_foto_dinding" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Foto Atap</label>
                                <input class="form-control-sm" type="file" name="foto_atap" accept="image/*"
                                       onchange="previewFile(this, 'foto_atap');">
                                <img id="preview_foto_atap" width="500" style="display: none"
                                     src="<?= base_url('public/transparent.png') ?>">
                            </div>
                        </div>
                    </div>

                    <input class="btn btn-primary mt-3" type="submit" value="Simpan">
                </form>
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

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            var status = "Geolocation is not supported by this browser.";
            console.log(status)
        }
    }

    function showPosition(position) {
        var _position = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
        console.log(_position)
    }

    getLocation();
</script>
<?php $this->endSection() ?>


