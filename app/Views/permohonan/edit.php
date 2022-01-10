<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php $validation = \Config\Services::validation(); ?>

                    <form action="<?= base_url('permohonan/update') ?>" method="POST"
                          enctype="multipart/form-data" autocomplete="off">

                        <input type="hidden" name="id_permohonan" value="<?= $permohonan->id_permohonan ?>">

                        <!-- Data Pengaju -->
                        <div class="d-sm-flex justify-content-between align-items-start mb-3">
                            <div>
                                <span class="badge badge-primary me-2">1</span>
                                <h4 class="d-inline card-title card-title-dash">Data Pengaju</h4>
                                <p class="card-subtitle card-subtitle-dash">
                                    Silahkan isi form data pengaju dibawah ini
                                </p>
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
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-select form-select-sm" name="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki"
                                            <?= ($permohonan->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>
                                        >Laki-laki
                                        </option>
                                        <option value="Perempuan"
                                            <?= ($permohonan->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>
                                        >Perempuan
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('jenis_kelamin')): ?>
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


                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input class="form-control form-control-sm" type="date" name="tgl_lahir"
                                           value="<?= $permohonan->tgl_lahir ?>">
                                    <?php if ($error = $validation->getError('tgl_lahir')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <input class="form-control form-control-lg p-3" type="text" name="alamat"
                                           value="<?= $permohonan->alamat ?>" placeholder="Alamat">
                                    <?php if ($error = $validation->getError('alamat')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Sektor Pekerjaan</label>
                                    <select class="form-select form-select-sm" name="sektor_pekerjaan">
                                        <option value="" selected disabled>Pilih Sektor Pekerjaan</option>
                                        <option value="PNS"
                                            <?= ($permohonan->sektor_pekerjaan == 'PNS') ? 'selected' : '' ?>
                                        >PNS
                                        </option>
                                        <option value="BUMN"
                                            <?= ($permohonan->sektor_pekerjaan == 'BUMN') ? 'selected' : '' ?>
                                        >BUMN
                                        </option>
                                        <option value="TNI / POLRI"
                                            <?= ($permohonan->sektor_pekerjaan == 'TNI / POLRI') ? 'selected' : '' ?>
                                        >TNI / POLRI
                                        </option>
                                        <option value="Karyawan Swasta"
                                            <?= ($permohonan->sektor_pekerjaan == 'Karyawan Swasta') ? 'selected' : '' ?>
                                        >Karyawan Swasta
                                        </option>
                                        <option value="Wiraswasta"
                                            <?= ($permohonan->sektor_pekerjaan == 'Wiraswasta') ? 'selected' : '' ?>
                                        >Wiraswasta
                                        </option>
                                        <option value="Petani"
                                            <?= ($permohonan->sektor_pekerjaan == 'Petani') ? 'selected' : '' ?>
                                        >Petani
                                        </option>
                                        <option value="Nelayan"
                                            <?= ($permohonan->sektor_pekerjaan == 'Nelayan') ? 'selected' : '' ?>
                                        >Nelayan
                                        </option>
                                        <option value="Buruh"
                                            <?= ($permohonan->sektor_pekerjaan == 'Buruh') ? 'selected' : '' ?>
                                        >Buruh
                                        </option>
                                        <option value="Lainnya"
                                            <?= ($permohonan->sektor_pekerjaan == 'Lainnya') ? 'selected' : '' ?>
                                        >Lainnya
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
                                        <option value=">2,6jt"
                                            <?= ($permohonan->penghasilan == '>2,6jt') ? 'selected' : '' ?>
                                        >> 2,6 juta
                                        </option>
                                        <option value="1,2 juta - 1,8 juta"
                                            <?= ($permohonan->penghasilan == '1,2 juta - 1,8 juta') ? 'selected' : '' ?>
                                        >1,2 juta - 1,8 juta
                                        </option>
                                        <option value="2,1 juta - 2,6 juta"
                                            <?= ($permohonan->penghasilan == '2,1 juta - 2,6 juta') ? 'selected' : '' ?>
                                        >2,1 juta - 2,6 juta
                                        </option>
                                        <option value="< 1,2 juta"
                                            <?= ($permohonan->penghasilan == '< 1,2 juta') ? 'selected' : '' ?>
                                        >< 1,2 juta
                                        </option>
                                        <option value="1,8 juta - 2,1 juta"
                                            <?= ($permohonan->penghasilan == '1,8 juta - 2,1 juta') ? 'selected' : '' ?>
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
                                        <option value=">2,6jt"
                                            <?= ($permohonan->pengeluaran == '>2,6jt') ? 'selected' : '' ?>
                                        >> 2,6 juta
                                        </option>
                                        <option value="1,2 juta - 1,8 juta"
                                            <?= ($permohonan->pengeluaran == '1,2 juta - 1,8 juta') ? 'selected' : '' ?>
                                        >1,2 juta - 1,8 juta
                                        </option>
                                        <option value="2,1 juta - 2,6 juta"
                                            <?= ($permohonan->pengeluaran == '2,1 juta - 2,6 juta') ? 'selected' : '' ?>
                                        >2,1 juta - 2,6 juta
                                        </option>
                                        <option value="< 1,2 juta"
                                            <?= ($permohonan->pengeluaran == '< 1,2 juta') ? 'selected' : '' ?>
                                        >< 1,2 juta
                                        </option>
                                        <option value="1,8 juta - 2,1 juta"
                                            <?= ($permohonan->pengeluaran == '1,8 juta - 2,1 juta') ? 'selected' : '' ?>
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
                                            <?= ($permohonan->status_pemilik_tanah == 'Milik Sendiri') ? 'selected' : '' ?>
                                        >Milik Sendiri
                                        </option>
                                        <option value="Bukan Milik Sendiri"
                                            <?= ($permohonan->status_pemilik_tanah == 'Bukan Milik Sendiri') ? 'selected' : '' ?>
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
                                            <?= ($permohonan->bukti_pemilik_tanah == 'Hak Milik') ? 'selected' : '' ?>
                                        >Hak Milik
                                        </option>
                                        <option value="Girik / Letter C"
                                            <?= ($permohonan->bukti_pemilik_tanah == 'Girik / Letter C') ? 'selected' : '' ?>
                                        >Girik / Letter C
                                        </option>
                                        <option value="HGB"
                                            <?= ($permohonan->bukti_pemilik_tanah == 'HGB') ? 'selected' : '' ?>
                                        >HGB
                                        </option>
                                        <option value="Surat Keterangan Lainnya"
                                            <?= ($permohonan->bukti_pemilik_tanah == 'Surat Keterangan Lainnya') ? 'selected' : '' ?>
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
                                            <?= ($permohonan->status_pemilik_rumah == 'Milik Sendiri') ? 'selected' : '' ?>
                                        >Milik Sendiri
                                        </option>
                                        <option value="Bukan Milik Sendiri"
                                            <?= ($permohonan->status_pemilik_rumah == 'Bukan Milik Sendiri') ? 'selected' : '' ?>
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
                                            <?= ($permohonan->aset_rumah == 'Ada') ? 'selected' : '' ?>
                                        >Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->aset_rumah == 'Tidak Ada') ? 'selected' : '' ?>
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
                                            <?= ($permohonan->aset_tanah == 'Ada') ? 'selected' : '' ?>
                                        >Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->aset_tanah == 'Tidak Ada') ? 'selected' : '' ?>
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
                            <div class="col-md-4">
                                <!-- Pondasi -->
                                <div class="form-group">
                                    <label class="form-label">Pondasi</label>
                                    <select class="form-select form-select-sm" name="pondasi">
                                        <option value="" selected disabled>Pilih Pondasi</option>
                                        <option value="Layak"
                                            <?= ($permohonan->pondasi == 'Layak') ? 'selected' : '' ?>
                                        >Layak
                                        </option>
                                        <option value="Tidak Layak"
                                            <?= ($permohonan->pondasi == 'Tidak Layak') ? 'selected' : '' ?>
                                        >Tidak Layak
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('pondasi')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Kolom Balok -->
                                <div class="form-group">
                                    <label class="form-label">Kolom Balok</label>
                                    <select class="form-select form-select-sm" name="kolom_balok">
                                        <option value="" selected disabled>Pilih Kolom Balok</option>
                                        <option value="Layak"
                                            <?= ($permohonan->kolom_balok == 'Layak') ? 'selected' : '' ?>
                                        >Layak
                                        </option>
                                        <option value="Tidak Layak"
                                            <?= ($permohonan->kolom_balok == 'Tidak Layak') ? 'selected' : '' ?>
                                        >Tidak Layak
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('kolom_balok')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Konstruksi Atap -->
                                <div class="form-group">
                                    <label class="form-label">Konstruksi Atap</label>
                                    <select class="form-select form-select-sm" name="konstruksi_atap">
                                        <option value="" selected disabled>Pilih Konstruksi Atap</option>
                                        <option value="Layak"
                                            <?= ($permohonan->konstruksi_atap == 'Layak') ? 'selected' : '' ?>
                                        >Layak
                                        </option>
                                        <option value="Tidak Layak"
                                            <?= ($permohonan->konstruksi_atap == 'Tidak Layak') ? 'selected' : '' ?>
                                        >Tidak Layak
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('konstruksi_atap')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Pencahayaan -->
                                <div class="form-group">
                                    <label class="form-label">Pencahayaan</label>
                                    <select class="form-select form-select-sm" name="pencahayaan">
                                        <option value="" selected disabled>Pilih Pencahayaan</option>
                                        <option value="Ada"
                                            <?= ($permohonan->pencahayaan == 'Ada') ? 'selected' : '' ?>
                                        >Ada
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->pencahayaan == 'Tidak Ada') ? 'selected' : '' ?>
                                        >Tidak Ada
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('pencahayaan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Ventilasi -->
                                <div class="form-group">
                                    <label class="form-label">Ventilasi</label>
                                    <select class="form-select form-select-sm" name="ventilasi">
                                        <option value="" selected disabled>Pilih Ventilasi</option>
                                        <option value="5% < dari luas lantai"
                                            <?= ($permohonan->ventilasi == '5% < dari luas lantai') ? 'selected' : '' ?>
                                        >5% < dari luas lantai
                                        </option>
                                        <option value="5% > dari luas lantai"
                                            <?= ($permohonan->ventilasi == '5% > dari luas lantai') ? 'selected' : '' ?>
                                        >5% > dari luas lantai
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->ventilasi == 'Tidak Ada') ? 'selected' : '' ?>
                                        >Tidak Ada
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('ventilasi')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- MCK -->
                                <div class="form-group">
                                    <label class="form-label">Kamar Mandi & Jamban (MCK)</label>
                                    <select class="form-select form-select-sm" name="mck">
                                        <option value="" selected disabled>Pilih MCK</option>
                                        <option value="Sendiri"
                                            <?= ($permohonan->mck == 'Sendiri') ? 'selected' : '' ?>
                                        >Sendiri
                                        </option>
                                        <option value="Bersama"
                                            <?= ($permohonan->mck == 'Bersama') ? 'selected' : '' ?>
                                        >Bersama
                                        </option>
                                        <option value="Umum"
                                            <?= ($permohonan->mck == 'Umum') ? 'selected' : '' ?>
                                        >Umum
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->mck == 'Tidak Ada') ? 'selected' : '' ?>
                                        >Tidak Ada
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('mck')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Kondisi MCK -->
                                <div class="form-group">
                                    <label class="form-label">Kondisi Kamar Mandi & Jamban (MCK)</label>
                                    <select class="form-select form-select-sm" name="kondisi_mck">
                                        <option value="" selected disabled>Pilih Kondisi MCK</option>
                                        <option value="Berfungsi"
                                            <?= ($permohonan->kondisi_mck == 'Berfungsi') ? 'selected' : '' ?>
                                        >Berfungsi
                                        </option>
                                        <option value="Tidak Berfungsi"
                                            <?= ($permohonan->kondisi_mck == 'Tidak Berfungsi') ? 'selected' : '' ?>
                                        >Tidak Berfungsi
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('kondisi_mck')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Pembuangan -->
                                <div class="form-group">
                                    <label class="form-label">Sistem Pembuangan Air Kotor</label>
                                    <select class="form-select form-select-sm" name="pembuangan">
                                        <option value="" selected disabled>Pilih Pembuangan</option>
                                        <option value="Ada"
                                            <?= ($permohonan->pembuangan == 'Ada') ? 'selected' : '' ?>
                                        >Ada (Septitank atau saluran pembuangan kota/lingkungan)
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->pembuangan == 'Tidak Ada') ? 'selected' : '' ?>
                                        >Tidak Ada
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('pembuangan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Kondisi Pembuangan -->
                                <div class="form-group">
                                    <label class="form-label">Kondisi Pembuangan</label>
                                    <select class="form-select form-select-sm" name="kondisi_pembuangan">
                                        <option value="" selected disabled>Pilih Kondisi Pembuangan</option>
                                        <option value="Berfungsi"
                                            <?= ($permohonan->kondisi_pembuangan == 'Berfungsi') ? 'selected' : '' ?>
                                        >Berfungsi
                                        </option>
                                        <option value="Tidak Berfungsi"
                                            <?= ($permohonan->kondisi_pembuangan == 'Tidak Berfungsi') ? 'selected' : '' ?>
                                        >Tidak Berfungsi
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('kondisi_pembuangan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Sumber Air Minum -->
                                <div class="form-group">
                                    <label class="form-label">Sumber Air Minum</label>
                                    <select class="form-select form-select-sm" name="sumber_air_minum">
                                        <option value="" selected disabled>Pilih Sumber Air Minum</option>
                                        <option value="PDAM"
                                            <?= ($permohonan->sumber_air_minum == 'PDAM') ? 'selected' : '' ?>
                                        >PDAM
                                        </option>
                                        <option value="Sumur Dalam"
                                            <?= ($permohonan->sumber_air_minum == 'Sumur Dalam') ? 'selected' : '' ?>
                                        >Sumur Dalam
                                        </option>
                                        <option value="Sumur Dangkal"
                                            <?= ($permohonan->sumber_air_minum == 'Sumur Dangkal') ? 'selected' : '' ?>
                                        >Sumur Dangkal
                                        </option>
                                        <option value="Mata Air"
                                            <?= ($permohonan->sumber_air_minum == 'Mata Air') ? 'selected' : '' ?>
                                        >Mata Air
                                        </option>
                                        <option value="Air Hujan"
                                            <?= ($permohonan->sumber_air_minum == 'Air Hujan') ? 'selected' : '' ?>
                                        >Air Hujan
                                        </option>
                                        <option value="Sungai"
                                            <?= ($permohonan->sumber_air_minum == 'Sungai') ? 'selected' : '' ?>
                                        >Sungai
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('sumber_air_minum')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Sumber Listrik -->
                                <div class="form-group">
                                    <label class="form-label">Sumber Listrik</label>
                                    <select class="form-select form-select-sm" name="sumber_listrik">
                                        <option value="" selected disabled>Pilih Sumber Listrik</option>
                                        <option value="PLN"
                                            <?= ($permohonan->sumber_listrik == 'PLN') ? 'selected' : '' ?>
                                        >PLN
                                        </option>
                                        <option value="PLN Menumpang"
                                            <?= ($permohonan->sumber_listrik == 'PLN Menumpang') ? 'selected' : '' ?>
                                        >PLN Menumpang
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->sumber_listrik == 'Tidak Ada') ? 'selected' : '' ?>
                                        >Tidak Ada
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('sumber_listrik')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Luas Rumah -->
                                <div class="form-group">
                                    <label class="form-label">Luas Rumah (m<sup>2</sup>)</label>
                                    <input class="form-control" type="number" name="luas_rumah"
                                           value="<?= $permohonan->luas_rumah ?>" placeholder="Luas Rumah">
                                    <?php if ($error = $validation->getError('luas_rumah')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Jumlah Penghuni -->
                                <div class="form-group">
                                    <label class="form-label">Jumlah Penghuni</label>
                                    <input class="form-control" type="number" name="jumlah_penghuni"
                                           value="<?= $permohonan->jumlah_penghuni ?>" placeholder="Jumlah Penghuni">
                                    <?php if ($error = $validation->getError('jumlah_penghuni')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Tinggi Bangunan -->
                                <div class="form-group">
                                    <label class="form-label">Tinggi Rata-Rata Bangunan (m<sup>2</sup> )</label>
                                    <select class="form-select form-select-sm" name="tinggi_bangunan">
                                        <option value="" selected disabled>Pilih Rata-Rata Tinggi Bangunan</option>
                                        <option value="< 2,4 M2"
                                            <?= ($permohonan->tinggi_bangunan == '< 2,4 M2') ? 'selected' : '' ?>
                                        >< 2,4 m2
                                        </option>
                                        <option value="> 2,4 M2"
                                            <?= ($permohonan->tinggi_bangunan == '> 2,4 M2') ? 'selected' : '' ?>
                                        >> 2,4 m2
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('tinggi_bangunan')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Ruangan Lainnya -->
                                <div class="form-group">
                                    <label class="form-label">Ruangan Lainnya</label>
                                    <select class="form-select form-select-sm" name="ruangan_lainnya">
                                        <option value="" selected disabled>Pilih Ruangan Lainnya</option>
                                        <option value="Ruang Keluarga"
                                            <?= ($permohonan->ruangan_lainnya == 'Ruang Keluarga') ? 'selected' : '' ?>
                                        >Ruang Keluarga
                                        </option>
                                        <option value="Ruang Tidur"
                                            <?= ($permohonan->ruangan_lainnya == 'Ruang Tidur') ? 'selected' : '' ?>
                                        >Ruang Tidur
                                        </option>
                                        <option value="Tidak Ada"
                                            <?= ($permohonan->ruangan_lainnya == 'Tidak Ada') ? 'selected' : '' ?>
                                        >Tidak Ada
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('ruangan_lainnya')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <!-- Material Atap -->
                                <div class="form-group">
                                    <label class="form-label">Material Atap Terluas</label>
                                    <select class="form-select form-select-sm" name="material_atap">
                                        <option value="" selected disabled>Pilih Material Atap</option>
                                        <option value="Beton"
                                            <?= ($permohonan->material_atap == 'Beton') ? 'selected' : '' ?>
                                        >Beton
                                        </option>
                                        <option value="Genteng"
                                            <?= ($permohonan->material_atap == 'Genteng') ? 'selected' : '' ?>
                                        >Genteng
                                        </option>
                                        <option value="Sirap"
                                            <?= ($permohonan->material_atap == 'Sirap') ? 'selected' : '' ?>
                                        >Sirap
                                        </option>
                                        <option value="Asbes"
                                            <?= ($permohonan->material_atap == 'Asbes') ? 'selected' : '' ?>
                                        >Asbes
                                        </option>
                                        <option value="Seng"
                                            <?= ($permohonan->material_atap == 'Seng') ? 'selected' : '' ?>
                                        >Seng
                                        </option>
                                        <option value="Rumbia/Daun Kelapa/Daun Aren"
                                            <?= ($permohonan->material_atap == 'Rumbia/Daun Kelapa/Daun Aren') ? 'selected' : '' ?>
                                        >Rumbia/Daun Kelapa/Daun Aren
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('material_atap')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Kondisi Atap -->
                                <div class="form-group">
                                    <label class="form-label">Kondisi Atap</label>
                                    <select class="form-select form-select-sm" name="kondisi_atap">
                                        <option value="" selected disabled>Pilih Kondisi Atap</option>
                                        <option value="Tidak Bocor"
                                            <?= ($permohonan->kondisi_atap == 'Tidak Bocor') ? 'selected' : '' ?>
                                        >Tidak Bocor
                                        </option>
                                        <option value="Bocor Sedang"
                                            <?= ($permohonan->kondisi_atap == 'Bocor Sedang') ? 'selected' : '' ?>
                                        >Bocor Sedang
                                        </option>
                                        <option value="Bocor Berat"
                                            <?= ($permohonan->kondisi_atap == 'Bocor Berat') ? 'selected' : '' ?>
                                        >Bocor Berat
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('kondisi_atap')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Material Dinding -->
                                <div class="form-group">
                                    <label class="form-label">Material Dinding</label>
                                    <select class="form-select form-select-sm" name="material_dinding">
                                        <option value="" selected disabled>Pilih Material Dinding</option>
                                        <option value="Bata/Batako Plester"
                                            <?= ($permohonan->material_dinding == 'Bata/Batako Plester') ? 'selected' : '' ?>
                                        >Bata/Batako Plester
                                        </option>
                                        <option value="Bata/Batako Ekspose"
                                            <?= ($permohonan->material_dinding == 'Bata/Batako Ekspose') ? 'selected' : '' ?>
                                        >Bata/Batako Ekspose
                                        </option>
                                        <option value="Kayu"
                                            <?= ($permohonan->material_dinding == 'Kayu') ? 'selected' : '' ?>
                                        >Kayu
                                        </option>
                                        <option value="Bilik/Bambu"
                                            <?= ($permohonan->material_dinding == 'Bilik/Bambu') ? 'selected' : '' ?>
                                        >Bilik/Bambu
                                        </option>
                                        <option value="GRC/Asbes"
                                            <?= ($permohonan->material_dinding == 'GRC/Asbes') ? 'selected' : '' ?>
                                        >GRC/Asbes
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('material_dinding')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Kondisi Dinding -->
                                <div class="form-group">
                                    <label class="form-label">Kondisi Dinding</label>
                                    <select class="form-select form-select-sm" name="kondisi_dinding">
                                        <option value="" selected disabled>Pilih Kondisi Dinding</option>
                                        <option value="Tidak Rusak"
                                            <?= ($permohonan->kondisi_dinding == 'Tidak Rusak') ? 'selected' : '' ?>
                                        >Tidak Rusak
                                        </option>
                                        <option value="Rusak Sedang"
                                            <?= ($permohonan->kondisi_dinding == 'Rusak Sedang') ? 'selected' : '' ?>
                                        >Rusak Sedang
                                        </option>
                                        <option value="Rusak Berat"
                                            <?= ($permohonan->kondisi_dinding == 'Rusak Berat') ? 'selected' : '' ?>
                                        >Rusak Berat
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('kondisi_dinding')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Material Lantai -->
                                <div class="form-group">
                                    <label class="form-label">Material Lantai</label>
                                    <select class="form-select form-select-sm" name="material_lantai">
                                        <option value="" selected disabled>Pilih Material Lantai</option>
                                        <option value="Keramik/Marmer"
                                            <?= ($permohonan->material_lantai == 'Keramik/Marmer') ? 'selected' : '' ?>
                                        >Keramik/Marmer
                                        </option>
                                        <option value="Ubin"
                                            <?= ($permohonan->material_lantai == 'Ubin') ? 'selected' : '' ?>
                                        >Ubin
                                        </option>
                                        <option value="Kayu"
                                            <?= ($permohonan->material_lantai == 'Kayu') ? 'selected' : '' ?>
                                        >Kayu
                                        </option>
                                        <option value="Plester"
                                            <?= ($permohonan->material_lantai == 'Plester') ? 'selected' : '' ?>
                                        >Plester
                                        </option>
                                        <option value="Bambu"
                                            <?= ($permohonan->material_lantai == 'Bambu') ? 'selected' : '' ?>
                                        >Bambu
                                        </option>
                                        <option value="Tanah"
                                            <?= ($permohonan->material_lantai == 'Tanah') ? 'selected' : '' ?>
                                        >Tanah
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('material_lantai')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Kondisi Lantai -->
                                <div class="form-group">
                                    <label class="form-label">Kondisi Lantai</label>
                                    <select class="form-select form-select-sm" name="kondisi_lantai">
                                        <option value="" selected disabled>Pilih Kondisi Lantai</option>
                                        <option value="Tidak Rusak"
                                            <?= ($permohonan->kondisi_lantai == 'Tidak Rusak') ? 'selected' : '' ?>
                                        >Tidak Rusak
                                        </option>
                                        <option value="Rusak Sedang"
                                            <?= ($permohonan->kondisi_lantai == 'Rusak Sedang') ? 'selected' : '' ?>
                                        >Rusak Sedang
                                        </option>
                                        <option value="Rusak Berat"
                                            <?= ($permohonan->kondisi_lantai == 'Rusak Berat') ? 'selected' : '' ?>
                                        >Rusak Berat
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('kondisi_lantai')): ?>
                                        <small class="text-danger"><?= $error ?></small>
                                    <?php endif ?>
                                </div>

                                <!-- Luas Lantai -->
                                <div class="form-group">
                                    <label class="form-label">Luas Lantai</label>
                                    <select class="form-select form-select-sm" name="luas_lantai">
                                        <option value="" selected disabled>Pilih Luas Lantai</option>
                                        <option value="< 4 M2"
                                            <?= ($permohonan->luas_lantai == '< 4 M2') ? 'selected' : '' ?>
                                        >Kurang dari 4 m2
                                        </option>
                                        <option value="4 M2 <= X < 7,2 M2"
                                            <?= ($permohonan->luas_lantai == '4 M2 <= X < 7,2 M2') ? 'selected' : '' ?>
                                        >Lebih dari atau sama dengan 4 m2 dan kurang dari 7,2 m2
                                        </option>
                                        <option value="7,2 M2 <= X < 9 M2"
                                            <?= ($permohonan->luas_lantai == '7,2 M2 <= X < 9 M2') ? 'selected' : '' ?>
                                        >Lebih dari atau sama dengan 7,2 m2 dan kurang dari 9 m2
                                        </option>
                                        <option value=">= 9 M2"
                                            <?= ($permohonan->luas_lantai == '>= 9 M2') ? 'selected' : '' ?>
                                        >Lebih dari atau sama dengan 9 m2
                                        </option>
                                        <option value=">= 10 M2"
                                            <?= ($permohonan->luas_lantai == '>= 10 M2') ? 'selected' : '' ?>
                                        >Lebih dari atau sama dengan 10 m2
                                        </option>
                                    </select>
                                    <?php if ($error = $validation->getError('luas_lantai')): ?>
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
                                <h4 class="d-inline card-title card-title-dash">Data Gambar</h4>
                                <p class="card-subtitle card-subtitle-dash">Silahkan isi form data gambar dibawah
                                    ini</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Rumah Tampak Depan</label>
                                    <input class="form-control-sm" type="file" name="gambar_depan">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Rumah Tampak Samping</label>
                                    <input class="form-control-sm" type="file" name="gambar_samping">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Rumah Tampak Belakang</label>
                                    <input class="form-control-sm" type="file" name="gambar_belakang">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Rumah Bagian Dalam</label>
                                    <input class="form-control-sm" type="file" name="gambar_dalam">
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