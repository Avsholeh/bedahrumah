<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <?php $validation = \Config\Services::validation(); ?>
                <form action="<?= base_url('permohonan/update') ?>" method="POST" enctype="multipart/form-data"
                      autocomplete="off">

                    <input type="hidden" value="<?= $permohonan->id_permohonan ?>" name="id_permohonan">

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
                                       value="<?= $permohonan->nama ?>" placeholder="Nama Pengaju" autofocus>
                                <?php if ($error = $validation->getError('nama')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">No KTP</label>
                                <input class="form-control form-control-sm" type="number" name="no_ktp"
                                       value="<?= $permohonan->no_ktp ?>" placeholder="No KTP">
                                <?php if ($error = $validation->getError('no_ktp')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">No KK</label>
                                <input class="form-control form-control-sm" type="number" name="no_kk"
                                       value="<?= $permohonan->no_kk ?>" placeholder="No KK">
                                <?php if ($error = $validation->getError('no_kk')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tempat Lahir</label>
                                <input class="form-control form-control-sm" type="text" name="tempat_lahir"
                                       value="<?= $permohonan->tempat_lahir ?>" placeholder="Tempat Lahir">
                                <?php if ($error = $validation->getError('tempat_lahir')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Tanggal Lahir</label>
                                <input class="form-control form-control-sm" type="date" name="tgl_lahir"
                                       value="<?= $permohonan->tgl_lahir ?>">
                                <?php if ($error = $validation->getError('tgl_lahir')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <select class="form-select form-select-sm" name="jenis_kelamin">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki"
                                        <?= $permohonan->jenis_kelamin == 'Laki-laki' ? 'selected' : '' ?>
                                    >Laki-laki
                                    </option>
                                    <option value="Perempuan"
                                        <?= $permohonan->jenis_kelamin == 'Perempuan' ? 'selected' : '' ?>
                                    >Perempuan
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
                                       value="<?= $permohonan->alamat ?>" placeholder="Alamat">
                                <?php if ($error = $validation->getError('alamat')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Penghasilan Perbulan</label>
                                <select class="form-select form-select-sm" name="penghasilan">
                                    <option value="" selected disabled>Pilih Penghasilan</option>
                                    <option value="> 2,6jt"
                                        <?= $permohonan->penghasilan == '> 2,6jt' ? 'selected' : '' ?>
                                    >> 2,6 juta
                                    </option>
                                    <option value="1,2 juta - 1,8 juta"
                                        <?= $permohonan->penghasilan == '1,2 juta - 1,8 juta' ? 'selected' : '' ?>
                                    >1,2 juta - 1,8 juta
                                    </option>
                                    <option value="2,1 juta - 2,6 juta"
                                        <?= $permohonan->penghasilan == '2,1 juta - 2,6 juta' ? 'selected' : '' ?>
                                    >2,1 juta - 2,6 juta
                                    </option>
                                    <option value="< 1,2 juta"
                                        <?= $permohonan->penghasilan == '< 1,2 juta' ? 'selected' : '' ?>
                                    >< 1,2 juta
                                    </option>
                                    <option value="1,8 juta - 2,1 juta"
                                        <?= $permohonan->penghasilan == '1,8 juta - 2,1 juta' ? 'selected' : '' ?>
                                    >1,8 juta - 2,1 juta
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('penghasilan')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Pengeluaran Perbulan</label>
                                <select class="form-select form-select-sm" name="pengeluaran">
                                    <option value="" selected disabled>Pilih Pengeluaran</option>
                                    <option value="> 2,6jt"
                                        <?= $permohonan->pengeluaran == '> 2,6jt' ? 'selected' : '' ?>
                                    >> 2,6 juta
                                    </option>
                                    <option value="1,2 juta - 1,8 juta"
                                        <?= $permohonan->pengeluaran == '1,2 juta - 1,8 juta' ? 'selected' : '' ?>
                                    >1,2 juta - 1,8 juta
                                    </option>
                                    <option value="2,1 juta - 2,6 juta"
                                        <?= $permohonan->pengeluaran == '2,1 juta - 2,6 juta' ? 'selected' : '' ?>
                                    >2,1 juta - 2,6 juta
                                    </option>
                                    <option value="< 1,2 juta"
                                        <?= $permohonan->pengeluaran == '< 1,2 juta' ? 'selected' : '' ?>
                                    >< 1,2 juta
                                    </option>
                                    <option value="1,8 juta - 2,1 juta"
                                        <?= $permohonan->pengeluaran == '1,8 juta - 2,1 juta' ? 'selected' : '' ?>
                                    >1,8 juta - 2,1 juta
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
                                    <option value="Milik Sendiri"
                                        <?= $permohonan->status_pemilik_tanah == 'Milik Sendiri' ? 'selected' : '' ?>
                                    >Milik Sendiri
                                    </option>
                                    <option value="Bukan Milik Sendiri"
                                        <?= $permohonan->status_pemilik_tanah == 'Bukan Milik Sendiri' ? 'selected' : '' ?>
                                    >Bukan Milik Sendiri
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('status_pemilik_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Bukti Kepemilikan Tanah</label>
                                <select class="form-select form-select-sm" name="bukti_pemilik_tanah">
                                    <option value="" selected disabled>Pilih Bukti Kepemilikan Tanah</option>
                                    <option value="Hak Milik"
                                        <?= $permohonan->bukti_pemilik_tanah == 'Hak Milik' ? 'selected' : '' ?>
                                    >Hak Milik
                                    </option>
                                    <option value="Girik / Letter C"
                                        <?= $permohonan->bukti_pemilik_tanah == 'Girik / Letter C' ? 'selected' : '' ?>
                                    >Girik / Letter C
                                    </option>
                                    <option value="HGB"
                                        <?= $permohonan->bukti_pemilik_tanah == 'HGB' ? 'selected' : '' ?>
                                    >HGB
                                    </option>
                                    <option value="Surat Keterangan Lainnya"
                                        <?= $permohonan->bukti_pemilik_tanah == 'Surat Keterangan Lainnya' ? 'selected' : '' ?>
                                    >Surat Keterangan Lainnya
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('bukti_pemilik_tanah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Status Kepemilikan Rumah</label>
                                <select class="form-select form-select-sm" name="status_pemilik_rumah">
                                    <option value="" selected disabled>Pilih Status Kepemilikan Rumah</option>
                                    <option value="Milik Sendiri"
                                        <?= $permohonan->status_pemilik_rumah == 'Milik Sendiri' ? 'selected' : '' ?>
                                    >Milik Sendiri
                                    </option>
                                    <option value="Bukan Milik Sendiri"
                                        <?= $permohonan->status_pemilik_rumah == 'Bukan Milik Sendiri' ? 'selected' : '' ?>
                                    >Bukan Milik Sendiri
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('status_pemilik_rumah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Aset Rumah Ditempat Lain</label>
                                <select class="form-select form-select-sm" name="aset_rumah">
                                    <option value="" selected disabled>Pilih Aset Rumah Ditempat Lain</option>
                                    <option value="Ada"
                                        <?= $permohonan->aset_rumah == 'Ada' ? 'selected' : '' ?>
                                    >Ada
                                    </option>
                                    <option value="Tidak Ada"
                                        <?= $permohonan->aset_rumah == 'Tidak Ada' ? 'selected' : '' ?>
                                    >Tidak Ada
                                    </option>
                                </select>
                                <?php if ($error = $validation->getError('aset_rumah')): ?>
                                    <small class="text-danger"><?= $error ?></small>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Aset Tanah Ditempat Lain</label>
                                <select class="form-select form-select-sm" name="aset_tanah">
                                    <option value="" selected disabled>Pilih Aset Tanah Ditempat Lain</option>
                                    <option value="Ada"
                                        <?= $permohonan->aset_tanah == 'Ada' ? 'selected' : '' ?>
                                    >Ada
                                    </option>
                                    <option value="Tidak Ada"
                                        <?= $permohonan->aset_tanah == 'Tidak Ada' ? 'selected' : '' ?>
                                    >Tidak Ada
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
                            <h4 class="d-inline card-title card-title-dash">Data Rumah</h4>
                            <p class="card-subtitle card-subtitle-dash">Silahkan isi form data rumah dibawah ini</p>
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
                                            <option <?= $skors[strtolower(str_replace(" ", "_", $indikator['indikator']))]
                                            == $item['atribut'] ? 'selected' : '' ?>
                                                    value="<?= $item['bobot'] ?>|<?= $item['atribut'] ?>"><?= $item['atribut'] ?></option>
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
                                <?php if (isset($dataGambar['BAGIAN DEPAN'])): ?>
                                    <img id="preview_gambar_depan" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['BAGIAN DEPAN'] ?>">
                                <?php else: ?>
                                    <img id="preview_gambar_depan" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Tampak Samping</label>
                                <input class="form-control-sm" type="file" name="gambar_samping" accept="image/*"
                                       onchange="previewFile(this, 'gambar_samping');">
                                <?php if (isset($dataGambar['BAGIAN SAMPING'])): ?>
                                    <img id="preview_gambar_samping" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['BAGIAN SAMPING'] ?>">
                                <?php else: ?>
                                    <img id="preview_gambar_samping" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Tampak Belakang</label>
                                <input class="form-control-sm" type="file" name="gambar_belakang" accept="image/*"
                                       onchange="previewFile(this, 'gambar_belakang');">
                                <?php if (isset($dataGambar['BAGIAN BELAKANG'])): ?>
                                    <img id="preview_gambar_belakang" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['BAGIAN BELAKANG'] ?>">
                                <?php else: ?>
                                    <img id="preview_gambar_belakang" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Rumah Bagian Dalam</label>
                                <input class="form-control-sm" type="file" name="gambar_dalam" accept="image/*"
                                       onchange="previewFile(this, 'gambar_dalam');">
                                <?php if (isset($dataGambar['BAGIAN DALAM'])): ?>
                                    <img id="preview_gambar_dalam" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['BAGIAN DALAM'] ?>">
                                <?php else: ?>
                                    <img id="preview_gambar_dalam" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Foto Lantai</label>
                                <input class="form-control-sm" type="file" name="foto_lantai" accept="image/*"
                                       onchange="previewFile(this, 'foto_lantai');">
                                <?php if (isset($dataGambar['FOTO LANTAI'])): ?>
                                    <img id="preview_foto_lantai" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['FOTO LANTAI'] ?>">
                                <?php else: ?>
                                    <img id="preview_foto_lantai" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Foto Dinding</label>
                                <input class="form-control-sm" type="file" name="foto_dinding" accept="image/*"
                                       onchange="previewFile(this, 'foto_dinding');">
                                <?php if (isset($dataGambar['FOTO DINDING'])): ?>
                                    <img id="preview_foto_dinding" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['FOTO DINDING'] ?>">
                                <?php else: ?>
                                    <img id="preview_foto_dinding" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label d-block">Foto Atap</label>
                                <input class="form-control-sm" type="file" name="foto_atap" accept="image/*"
                                       onchange="previewFile(this, 'foto_atap');">
                                <?php if (isset($dataGambar['FOTO ATAP'])): ?>
                                    <img id="preview_foto_atap" width="500"
                                         src="data:image/jpeg;base64, <?= $dataGambar['FOTO ATAP'] ?>">
                                <?php else: ?>
                                    <img id="preview_foto_atap" width="500" style="display: none"
                                         src="<?= base_url('public/transparent.png') ?>">
                                <?php endif ?>
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
                $("#preview_" + id)
                    .css('display', 'inline-block')
                    .attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<?php $this->endSection() ?>


