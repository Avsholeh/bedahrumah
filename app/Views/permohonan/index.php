<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!--    <ul class="nav nav-pills border-0">-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link active" href="#">Data Pengaju</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link " href="#">Data Rumah</a>-->
<!--        </li>-->
<!--        <li class="nav-item">-->
<!--            <a class="nav-link " href="#">Data Gambar</a>-->
<!--        </li>-->
<!--    </ul>-->

<!-- @TODO perbarui layout permohonan -->
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
                            <h4 class="d-inline card-title card-title-dash">Data Pengaju</h4>
                            <p class="card-subtitle card-subtitle-dash">Silahkan isi form data pengaju dibawah
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

                            <div class="form-group">
                                <label class="form-label">No KTP</label>
                                <input class="form-control form-control-sm" type="number" name="no_ktp"
                                       value="<?= old('no_ktp') ?>" placeholder="No KTP">
                                <?php if ($error = $validation->getError('no_ktp')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">No KK</label>
                                <input class="form-control form-control-sm" type="number" name="no_kk"
                                       value="<?= old('no_kk') ?>" placeholder="No KK">
                                <?php if ($error = $validation->getError('no_kk')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">No KK</label>
                                <input class="form-control form-control-sm" type="number" name="no_kk"
                                       value="<?= old('no_kk') ?>" placeholder="No KK">
                                <?php if ($error = $validation->getError('no_kk')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tempat Lahir</label>
                                <input class="form-control form-control-sm" type="text" name="tempat_lahir"
                                       value="<?= old('tempat_lahir') ?>" placeholder="Tempat Lahir">
                                <?php if ($error = $validation->getError('tempat_lahir')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

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

                            <div class="form-group">
                                <label class="form-label">Status Keluarga</label>
                                <select class="form-select form-select-sm" name="status_keluarga">
                                    <option value="" selected disabled>Pilih Status Keluarga</option>
                                    <option value="Keluarga Utuh" <?= old('status_keluarga') == 'Keluarga Utuh' ? 'selected' : '' ?>
                                    >Keluarga Utuh
                                    </option>
                                    <option value="Keluarga Tidak Utuh" <?= old('status_keluarga') == 'Keluarga Tidak Utuh' ? 'selected' : '' ?>
                                    >Keluarga Tidak Utuh
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('status_keluarga')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Alamat</label>
                                <input class="form-control form-control-lg p-3" type="text" name="alamat"
                                       value="<?= old('alamat') ?>" placeholder="Alamat">
                                <?php if ($error = $validation->getError('alamat')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Sektor Pekerjaan</label>
                                <select class="form-select form-select-sm" name="sektor_pekerjaan">
                                    <option value="" selected disabled>Pilih Sektor Pekerjaan</option>
                                    <option value="PNS" <?= old('sektor_pekerjaan') == 'PNS' ? 'selected' : '' ?>
                                    >PNS
                                    </option>
                                    <option value="BUMN" <?= old('sektor_pekerjaan') == 'BUMN' ? 'selected' : '' ?>
                                    >BUMN
                                    </option>
                                    <option value="TNI / POLRI" <?= old('sektor_pekerjaan') == 'TNI / POLRI' ? 'selected' : '' ?>
                                    >TNI / POLRI
                                    </option>
                                    <option value="Karyawan Swasta" <?= old('sektor_pekerjaan') == 'Karyawan Swasta' ? 'selected' : '' ?>
                                    >Karyawan Swasta
                                    </option>
                                    <option value="Wiraswasta" <?= old('sektor_pekerjaan') == 'Wiraswasta' ? 'selected' : '' ?>
                                    >Wiraswasta
                                    </option>
                                    <option value="Petani" <?= old('sektor_pekerjaan') == 'Petani' ? 'selected' : '' ?>
                                    >Petani
                                    </option>
                                    <option value="Nelayan" <?= old('sektor_pekerjaan') == 'Nelayan' ? 'selected' : '' ?>
                                    >Nelayan
                                    </option>
                                    <option value="Buruh" <?= old('sektor_pekerjaan') == 'Buruh' ? 'selected' : '' ?>
                                    >Buruh
                                    </option>
                                    <option value="Tidak Bekerja" <?= old('sektor_pekerjaan') == 'Tidak Bekerja' ? 'selected' : '' ?>
                                    >Tidak Bekerja
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('sektor_pekerjaan')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Penghasilan Perbulan</label>
                                <select class="form-select form-select-sm" name="penghasilan">
                                    <option value="" selected disabled>Pilih Penghasilan</option>
                                    <option <?= old('penghasilan') == '>2,6jt' ? 'selected' : '' ?>
                                            value=">2,6jt">> 2,6 juta</option>
                                    <option <?= old('penghasilan') == '1,2 juta - 1,8 juta' ? 'selected' : '' ?>
                                            value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta</option>
                                    <option <?= old('penghasilan') == '2,1 juta - 2,6 juta' ? 'selected' : '' ?>
                                            value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta</option>
                                    <option <?= old('penghasilan') == '< 1,2 juta' ? 'selected' : '' ?>
                                            value="< 1,2 juta">< 1,2 juta</option>
                                    <option <?= old('penghasilan') == '1,8 juta - 2,1 juta' ? 'selected' : '' ?>
                                            value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta</option>
                                </select>
                                <?php if ($error = $validation->getError('penghasilan')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Pengeluaran Perbulan</label>
                                <select class="form-select form-select-sm" name="pengeluaran">
                                    <option value="" selected disabled>Pilih Pengeluaran</option>
                                    <option <?= old('pengeluaran') == '>2,6jt' ? 'selected' : '' ?>
                                            value=">2,6jt">> 2,6 juta</option>
                                    <option <?= old('pengeluaran') == '1,2 juta - 1,8 juta' ? 'selected' : '' ?>
                                            value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta</option>
                                    <option <?= old('pengeluaran') == '2,1 juta - 2,6 juta' ? 'selected' : '' ?>
                                            value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta</option>
                                    <option <?= old('pengeluaran') == '< 1,2 juta' ? 'selected' : '' ?>
                                            value="< 1,2 juta">< 1,2 juta</option>
                                    <option <?= old('pengeluaran') == '1,8 juta - 2,1 juta' ? 'selected' : '' ?>
                                            value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta</option>
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
                                    <option <?= old('status_pemilik_tanah') == 'Milik Sendiri' ? 'selected' : ''?>
                                            value="Milik Sendiri">Milik Sendiri</option>
                                    <option <?= old('status_pemilik_tanah') == 'Bukan Milik Sendiri' ? 'selected' : ''?>
                                            value="Bukan Milik Sendiri">Bukan Milik Sendiri</option>
                                </select>
                                <?php if ($error = $validation->getError('status_pemilik_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Bukti Kepemilikan Tanah</label>
                                <select class="form-select form-select-sm" name="bukti_pemilik_tanah">
                                    <option value="" selected disabled>Pilih Bukti Kepemilikan Tanah</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Hak Milik">Hak Milik</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Girik / Letter C">Girik / Letter C</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="HGB">HGB</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Surat Keterangan Lainnya">Surat Keterangan Lainnya</option>
                                </select>
                                <?php if ($error = $validation->getError('bukti_pemilik_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status Kepemilikan Rumah</label>
                                <select class="form-select form-select-sm" name="status_pemilik_rumah">
                                    <option value="" selected disabled>Pilih Status Kepemilikan Rumah</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Milik Sendiri">Milik Sendiri</option>
                                    <option <?= old('') == '' ? 'selected' : '' ?>
                                            value="Bukan Milik Sendiri">Bukan Milik Sendiri</option>
                                </select>
                                <?php if ($error = $validation->getError('status_pemilik_rumah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Aset Rumah Ditempat Lain</label>
                                <select class="form-select form-select-sm" name="aset_rumah">
                                    <option value="" selected disabled>Pilih Aset Rumah Ditempat Lain</option>
                                    <option <?= old('aset_rumah') == 'Ada' ? 'selected' : '' ?>
                                            value="Ada">Ada</option>
                                    <option <?= old('aset_rumah') == 'Tidak Ada' ? 'selected' : '' ?>
                                            value="Tidak Ada">Tidak Ada</option>
                                </select>
                                <?php if ($error = $validation->getError('aset_rumah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Aset Tanah Ditempat Lain</label>
                                <select class="form-select form-select-sm" name="aset_tanah">
                                    <option value="" selected disabled>Pilih Aset Tanah Ditempat Lain</option>
                                    <option <?= old('aset_tanah') == 'Ada' ? 'selected' : '' ?>
                                            value="Ada">Ada</option>
                                    <option <?= old('aset_tanah') == 'Tidak Ada' ? 'selected' : '' ?>
                                            value="Tidak Ada">Tidak Ada</option>
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
                            <h4 class="d-inline card-title card-title-dash">Data Rumah</h4>
                            <p class="card-subtitle card-subtitle-dash">Silahkan isi form data rumah dibawah ini</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <!-- Pencahayaan -->
                            <div class="form-group">
                                <label class="form-label">Pencahayaan</label>
                                <select class="form-select form-select-sm" name="pencahayaan">
                                    <option value="" selected disabled>Pilih Pencahayaan</option>
                                    <option <?= old('pencahayaan') == 'Ada' ? 'selected' : '' ?>
                                            value="Ada">Ada</option>
                                    <option <?= old('pencahayaan') == 'Tidak Ada' ? 'selected' : '' ?>
                                            value="Tidak Ada">Tidak Ada</option>
                                </select>
                                <?php if ($error = $validation->getError('pencahayaan')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <!-- Jenis Lantai -->
                            <div class="form-group">
                                <label class="form-label">Jenis Lantai</label>
                                <select class="form-select form-select-sm" name="jenis_lantai">
                                    <option value="" selected disabled>Pilih Jenis Lantai</option>
                                    <option <?= old('jenis_lantai') == 'Keramik/Marmer' ? 'selected' : '' ?>
                                            value="Keramik/Marmer">Keramik/Marmer</option>
                                    <option <?= old('jenis_lantai') == 'Ubin' ? 'selected' : '' ?>
                                            value="Ubin">Ubin</option>
                                    <option <?= old('jenis_lantai') == 'Kayu' ? 'selected' : '' ?>
                                            value="Kayu">Kayu</option>
                                    <option <?= old('jenis_lantai') == 'Plester' ? 'selected' : '' ?>
                                            value="Plester">Plester</option>
                                    <option <?= old('jenis_lantai') == 'Bambu' ? 'selected' : '' ?>
                                            value="Bambu">Bambu</option>
                                    <option <?= old('jenis_lantai') == 'Tanah' ? 'selected' : '' ?>
                                            value="Tanah">Tanah</option>
                                </select>
                                <?php if ($error = $validation->getError('jenis_lantai')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Jenis Atap -->
                            <div class="form-group">
                                <label class="form-label">Jenis Atap</label>
                                <select class="form-select form-select-sm" name="jenis_atap">
                                    <option value="" selected disabled>Pilih Jenis Atap</option>
                                    <option <?= old('jenis_atap') == 'Beton' ? 'selected' : '' ?>
                                            value="Beton">Beton</option>
                                    <option <?= old('jenis_atap') == 'Genteng' ? 'selected' : '' ?>
                                            value="Genteng">Genteng</option>
                                    <option <?= old('jenis_atap') == 'Sirap' ? 'selected' : '' ?>
                                            value="Sirap">Sirap</option>
                                    <option <?= old('jenis_atap') == 'Asbes' ? 'selected' : '' ?>
                                            value="Asbes">Asbes</option>
                                    <option <?= old('jenis_atap') == 'Seng' ? 'selected' : '' ?>
                                            value="Seng">Seng</option>
                                    <option <?= old('jenis_atap') == 'Rumbia/Daun Kelapa/Daun Aren' ? 'selected' : '' ?>
                                            value="Rumbia/Daun Kelapa/Daun Aren">Rumbia/Daun Kelapa/Daun Aren
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('jenis_atap')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <!-- Kondisi Atap -->
                            <div class="form-group">
                                <label class="form-label">Kondisi Atap</label>
                                <select class="form-select form-select-sm" name="kondisi_atap">
                                    <option value="" selected disabled>Pilih Kondisi Atap</option>
                                    <option <?= old('kondisi_atap') == 'Baik' ? 'selected' : '' ?>
                                            value="Baik">Baik</option>
                                    <option <?= old('kondisi_atap') == 'Sedang' ? 'selected' : '' ?>
                                            value="Sedang">Sedang</option>
                                    <option <?= old('kondisi_atap') == 'Buruk' ? 'selected' : '' ?>
                                            value="Buruk">Buruk</option>
                                </select>
                                <?php if ($error = $validation->getError('kondisi_atap')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!-- Jenis Dinding -->
                            <div class="form-group">
                                <label class="form-label">Jenis Dinding</label>
                                <select class="form-select form-select-sm" name="jenis_dinding">
                                    <option value="" selected disabled>Pilih Jenis Dinding</option>
                                    <option <?= old('jenis_dinding') == 'Bata/Batako Plester' ? 'selected' : '' ?>
                                            value="Bata/Batako Plester">Bata/Batako Plester</option>
                                    <option <?= old('jenis_dinding') == 'Bata/Batako Ekspose' ? 'selected' : '' ?>
                                            value="Bata/Batako Ekspose">Bata/Batako Ekspose</option>
                                    <option <?= old('jenis_dinding') == 'Kayu' ? 'selected' : '' ?>
                                            value="Kayu">Kayu</option>
                                    <option <?= old('jenis_dinding') == 'Bilik/Bambu' ? 'selected' : '' ?>
                                            value="Bilik/Bambu">Bilik/Bambu</option>
                                    <option <?= old('jenis_dinding') == 'GRC/Asbes' ? 'selected' : '' ?>
                                            value="GRC/Asbes">GRC/Asbes</option>
                                </select>
                                <?php if ($error = $validation->getError('jenis_dinding')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <!-- Kondisi Dinding -->
                            <div class="form-group">
                                <label class="form-label">Kondisi Dinding</label>
                                <select class="form-select form-select-sm" name="kondisi_dinding">
                                    <option value="" selected disabled>Pilih Kondisi Dinding</option>
                                    <option <?= old('kondisi_dinding') == 'Baik' ? 'selected' : '' ?>
                                            value="Baik">Baik</option>
                                    <option <?= old('kondisi_dinding') == 'Sedang' ? 'selected' : '' ?>
                                            value="Sedang">Sedang</option>
                                    <option <?= old('kondisi_dinding') == 'Buruk' ? 'selected' : '' ?>
                                            value="Buruk">Buruk</option>
                                </select>
                                <?php if ($error = $validation->getError('kondisi_dinding')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!-- Data Gambar -->
                    <div class="d-sm-flex justify-content-between align-items-start my-3">
                        <div>
                            <span class="badge badge-primary me-2">2</span>
                            <h4 class="d-inline card-title card-title-dash">Data Gambar</h4>
                            <p class="card-subtitle card-subtitle-dash">
                                Silahkan isi form data gambar dibawah ini.
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
        var file = $("input[type=file]").get(0).files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function () {
                $("#preview_" + id)
                    .css('display', 'inline-block')
                    .attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<?php $this->endSection() ?>


