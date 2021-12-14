<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('pengajuan/simpan') ?>" method="POST" enctype="multipart/form-data"
                          autocomplete="off">

                        <!-- Data Pengaju -->
                        <div class="d-sm-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge badge-primary me-2">1</span>
                                <h4 class="d-inline card-title card-title-dash">Data Pengaju</h4>
                                <p class="card-subtitle card-subtitle-dash">Silahkan isi form data pengaju dibawah ini</p>
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
                                           placeholder="No KTP">
                                    <?php if ($error = $validation->getError('no_ktp')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">No KK</label>
                                    <input class="form-control form-control-sm" type="number" name="no_kk"
                                           placeholder="No KK">
                                    <?php if ($error = $validation->getError('no_kk')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select form-select-sm" name="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <?php if ($error = $validation->getError('jenis_kelamin')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Tempat Lahir</label>
                                    <input class="form-control form-control-sm" type="text" name="tempat_lahir"
                                           placeholder="Tempat Lahir">
                                    <?php if ($error = $validation->getError('tempat_lahir')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>


                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control form-control-sm" type="date" name="tgl_lahir">
                                    <?php if ($error = $validation->getError('tgl_lahir')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <input class="form-control form-control-lg p-3" type="text" name="alamat"
                                           placeholder="Alamat">
                                    <?php if ($error = $validation->getError('alamat')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Sektor Pekerjaan</label>
                                    <select class="form-select form-select-sm" name="sektor_pekerjaan">
                                        <option value="" selected disabled>Pilih Sektor Pekerjaan</option>
                                        <option value="PNS">PNS</option>
                                        <option value="BUMN">BUMN</option>
                                        <option value="TNI / POLRI">TNI / POLRI</option>
                                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                                        <option value="Wiraswasta">Wiraswasta</option>
                                        <option value="Petani">Petani</option>
                                        <option value="Nelayan">Nelayan</option>
                                        <option value="Buruh">Buruh</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                    <?php if ($error = $validation->getError('sektor_pekerjaan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Penghasilan Perbulan</label>
                                    <select class="form-select form-select-sm" name="penghasilan">
                                        <option value="" selected disabled>Pilih Penghasilan</option>
                                        <option value=">2,6jt">> 2,6 juta</option>
                                        <option value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta</option>
                                        <option value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta</option>
                                        <option value="< 1,2 juta">< 1,2 juta</option>
                                        <option value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta</option>
                                    </select>
                                    <?php if ($error = $validation->getError('penghasilan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pengeluaran Perbulan</label>
                                    <select class="form-select form-select-sm" name="pengeluaran">
                                        <option value="" selected disabled>Pilih Pengeluaran</option>
                                        <option value=">2,6jt">> 2,6 juta</option>
                                        <option value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta</option>
                                        <option value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta</option>
                                        <option value="< 1,2 juta">< 1,2 juta</option>
                                        <option value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta</option>
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
                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                        <option value="Bukan Milik Sendiri">Bukan Milik Sendiri</option>
                                    </select>
                                    <?php if ($error = $validation->getError('status_pemilik_tanah')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Bukti Kepemilikan Tanah</label>
                                    <select class="form-select form-select-sm" name="bukti_pemilik_tanah">
                                        <option value="" selected disabled>Pilih Bukti Kepemilikan Tanah</option>
                                        <option value="Hak Milik">Hak Milik</option>
                                        <option value="Girik / Letter C">Girik / Letter C</option>
                                        <option value="HGB">HGB</option>
                                        <option value="Surat Keterangan Lainnya">Surat Keterangan Lainnya</option>
                                    </select>
                                    <?php if ($error = $validation->getError('bukti_pemilik_tanah')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Status Kepemilikan Rumah</label>
                                    <select class="form-select form-select-sm" name="status_pemilik_rumah">
                                        <option value="" selected disabled>Pilih Status Kepemilikan Rumah</option>
                                        <option value="Milik Sendiri">Milik Sendiri</option>
                                        <option value="Bukan Milik Sendiri">Bukan Milik Sendiri</option>
                                    </select>
                                    <?php if ($error = $validation->getError('status_pemilik_rumah')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Aset Rumah Ditempat Lain</label>
                                    <select class="form-select form-select-sm" name="aset_rumah">
                                        <option value="" selected disabled>Pilih Aset Rumah Ditempat Lain</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                    <?php if ($error = $validation->getError('aset_rumah')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Aset Tanah Ditempat Lain</label>
                                    <select class="form-select form-select-sm" name="aset_tanah">
                                        <option value="" selected disabled>Pilih Aset Tanah Ditempat Lain</option>
                                        <option value="Ada">Ada</option>
                                        <option value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                    <?php if ($error = $validation->getError('aset_tanah')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <!-- Data Pengaju -->
                        <div class="d-sm-flex justify-content-between align-items-start my-3">
                            <div>
                                <span class="badge badge-primary me-2">2</span>
                                <h4 class="d-inline card-title card-title-dash">Data Rumah</h4>
                                <p class="card-subtitle card-subtitle-dash">Silahkan isi form data rumah dibawah ini</p>
                            </div>
                        </div>
                        <input class="btn btn-primary mt-3" type="submit" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection() ?>