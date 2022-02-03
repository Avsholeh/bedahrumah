<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card rounded-0">
                                <div class="card-header">
                                    <h4>Pencarian</h4>
                                </div>
                                <div class="card-body">
                                    <?php $validation = \Config\Services::validation(); ?>
                                    <form action="<?= base_url('laporan/proses') ?>" method="GET">
                                        <div class="form-group">
                                            <label class="form-label">Dari tanggal <span
                                                        class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="date" name="dari_tanggal"
                                                   value="<?= old('dari_tanggal') ?>" required>
                                            <?php if ($error = $validation->getError('dari_tanggal')): ?>
                                                <small class="text-danger"><?= $error ?></small>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Sampai tanggal <span class="text-danger">*</span></label>
                                            <input class="form-control form-control-sm" type="date"
                                                   name="sampai_tanggal"
                                                   value="<?= old('sampai_tanggal') ?>" required>
                                            <?php if ($error = $validation->getError('sampai_tanggal')): ?>
                                                <small class="text-danger"><?= $error ?></small>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select class="form-select form-select-sm" name="status">
                                                <option value="" disabled selected>Pilih Status</option>
                                                <option value="SUDAH DIPROSES">Sudah diproses</option>
                                                <option value="BELUM DIPROSES">Belum diproses</option>
                                            </select>
                                            <?php if ($error = $validation->getError('status')): ?>
                                                <small class="text-danger"><?= $error ?></small>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Jumlah Data</label>
                                            <input class="form-control form-control-sm" type="number" name="jumlah_data"
                                                   value="<?= old('jumlah_data') ?>">
                                            <?php if ($error = $validation->getError('jumlah_data')): ?>
                                                <small class="text-danger"><?= $error ?></small>
                                            <?php endif ?>
                                        </div>

                                        <div class="form-group">
                                            <input class="btn btn-primary" type="submit" value="Proses">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card rounded-0">
                                <div class="card-body">
                                    <?php if (isset($permohonans)): ?>

                                        <div class="alert alert-success text-dark">
                                            Hasil pencarian dari tanggal <?= $dariTanggal ?> sampai
                                            tanggal <?= $sampaiTanggal ?> berjumlah <?= $countPermohonan ?> data.
                                        </div>

                                        <div class="mb-3">
                                            <form action="<?= base_url('laporan/cetak') ?>" method="GET">
                                                <input type="hidden" name="dari_tanggal" value="<?= $dariTanggal ?>">
                                                <input type="hidden" name="sampai_tanggal" value="<?= $sampaiTanggal ?>">
                                                <input type="hidden" name="status" value="<?= $status ?>">
                                                <input type="hidden" name="jumlah_data" value="<?= $countPermohonan ?>">
                                                <button type="submit" class="btn btn-info btn-sm">
                                                    <i class="icon icon-printer me-3"></i>Cetak PDF
                                                </button>
                                            </form>
                                        </div>

                                        <?php foreach ($permohonans as $permohonan): ?>
                                            <div class="card mb-3 shadow-sm">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <?php if ($permohonan['jenis_kelamin'] == 'Laki-laki'): ?>
                                                                <img src="<?= base_url('public/images/user-male.png') ?>"
                                                                     width="80">
                                                            <?php else: ?>
                                                                <img src="<?= base_url('public/images/user-female.png') ?>"
                                                                     width="80">
                                                            <?php endif ?>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row g-2">
                                                                <div class="col-md-4">
                                                                    <small class="text-muted d-block">Nama
                                                                        Lengkap</small>
                                                                    <?= $permohonan['nama'] ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <small class="text-muted d-block">Tanggal</small>
                                                                    <?= $permohonan['tanggal'] ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <small class="text-muted d-block">Alamat</small>
                                                                    <?= $permohonan['alamat'] ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <small class="text-muted d-block">Status</small>
                                                                    <?= $permohonan['status'] ?>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <small class="text-muted d-block">Jenis
                                                                        Kelamin</small>
                                                                    <?= $permohonan['jenis_kelamin'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>

                                        <?= $pager->links() ?>

                                    <?php else: ?>
                                        <div class="d-flex justify-content-center align-items-center flex-column my-5">
                                            <img src="<?= base_url('public/images/search.png') ?>" width="350">
                                        </div>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
    </script>
<?php $this->endSection() ?>