<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="card">
        <div class="card-body">
            <div class="d-sm-flex justify-content-between align-items-start mb-3">
                <div>
                    <h4 class="card-title card-title-dash">Data Pengaju</h4>
                    <p class="card-subtitle card-subtitle-dash">Silahkan isi form data pengaju dibawah ini</p>
                </div>
            </div>
            <form action="<?= base_url('pengaju/simpan') ?>" method="POST" enctype="multipart/form-data"
                  autocomplete="off">
                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Nama Pengaju</label>
                            <input class="form-control form-control-sm" type="text" name="nama"
                                   placeholder="Nama Pengaju" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="">No KTP</label>
                            <input class="form-control form-control-sm" type="number" name="no_ktp"
                                   placeholder="No KTP">
                        </div>

                        <div class="form-group">
                            <label for="">No KK</label>
                            <input class="form-control form-control-sm" type="number" name="no_kk"
                                   placeholder="No KK">
                        </div>

                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-select form-select-sm" name="jenis_kelamin">
                                <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Tempat Lahir</label>
                            <input class="form-control form-control-sm" type="text" name="tempat_lahir"
                                   placeholder="Tempat Lahir">
                        </div>

                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input class="form-control form-control-sm" type="date" name="tgl_lahir">
                        </div>

                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input class="form-control form-control-lg p-3" type="text" name="alamat"
                                   placeholder="Alamat">
                        </div>

                        <div class="form-group">
                            <label for="">Sektor Pekerjaan</label>
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
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-group">
                            <label for="">Penghasilan Perbulan</label>
                            <select class="form-select form-select-sm" name="penghasilan">
                                <option value="" selected disabled>Pilih Penghasilan</option>
                                <option value=">2,6jt">> 2,6 juta</option>
                                <option value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta</option>
                                <option value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta</option>
                                <option value="< 1,2 juta">< 1,2 juta</option>
                                <option value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Pengeluaran Perbulan</label>
                            <select class="form-select form-select-sm" name="pengeluaran">
                                <option value="" selected disabled>Pilih Pengeluaran</option>
                                <option value=">2,6jt">> 2,6 juta</option>
                                <option value="1,2 juta - 1,8 juta">1,2 juta - 1,8 juta</option>
                                <option value="2,1 juta - 2,6 juta">2,1 juta - 2,6 juta</option>
                                <option value="< 1,2 juta">< 1,2 juta</option>
                                <option value="1,8 juta - 2,1 juta">1,8 juta - 2,1 juta</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status Kepemilikan Tanah</label>
                            <select class="form-select form-select-sm" name="status_pemilik_tanah">
                                <option value="" selected disabled>Pilih Status Kepemilikan Tanah</option>
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Bukan Milik Sendiri">Bukan Milik Sendiri</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Bukti Kepemilikan Tanah</label>
                            <select class="form-select form-select-sm" name="bukti_pemilik_tanah">
                                <option value="" selected disabled>Pilih Bukti Kepemilikan Tanah</option>
                                <option value="Hak Milik">Hak Milik</option>
                                <option value="Girik / Letter C">Girik / Letter C</option>
                                <option value="HGB">HGB</option>
                                <option value="Surat Keterangan Lainnya">Surat Keterangan Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Status Kepemilikan Rumah</label>
                            <select class="form-select form-select-sm" name="status_pemilik_rumah">
                                <option value="" selected disabled>Pilih Status Kepemilikan Rumah</option>
                                <option value="Milik Sendiri">Milik Sendiri</option>
                                <option value="Bukan Milik Sendiri">Bukan Milik Sendiri</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Aset Rumah Ditempat Lain</label>
                            <select class="form-select form-select-sm" name="aset_rumah">
                                <option value="" selected disabled>Pilih Aset Rumah Ditempat Lain</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Aset Tanah Ditempat Lain</label>
                            <select class="form-select form-select-sm" name="aset_tanah">
                                <option value="" selected disabled>Pilih Aset Tanah Ditempat Lain</option>
                                <option value="Ada">Ada</option>
                                <option value="Tidak Ada">Tidak Ada</option>
                            </select>
                        </div>
                    </div>
                </div>

                <input class="btn btn-primary mt-3" type="submit" value="Simpan">

            </form>
        </div>
    </div>

<?php $this->endSection() ?>