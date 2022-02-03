<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>
<?php use Carbon\Carbon; ?>
    <div class="row">
        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-primary card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Jumlah Pengaju</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white"><?= $jumlahPengaju ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-warning card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Belum Verifikasi</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white"><?= $belumVerifikasi ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-md-4 py-3">
            <div class="card bg-gradient-danger card-rounded">
                <div class="card-body">
                    <h4 class="card-title card-title-dash text-white mb-4">Sudah Verifikasi</h4>
                    <div class="row">
                        <div class="col-sm-4">
                            <h2 class="text-white"><?= $sudahVerifikasi ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start mb-3">
                        <h4 class="d-inline card-title card-title-dash text-center">Terakhir Diajukan</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th class="d-none d-md-table-cell">Pengaju</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lastPermohonan as $index => $permohonan): ?>
                                <tr>
                                    <td><?= ++$index ?></td>
                                    <td><?= Carbon::createFromFormat('Y-m-d H:m:s', $permohonan->tanggal)->locale('id')->diffForHumans() ?></td>
                                    <td class="d-none d-md-table-cell"><?= $permohonan->nama_lengkap ?></td>
                                    <td>
                                        <?php if ($permohonan->status == 'SUDAH DIPROSES'): ?>
                                            <span class="badge badge-success"><?= $permohonan->status ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"><?= $permohonan->status ?></span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="card rounded-0">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start mb-3">
                        <h4 class="d-inline card-title card-title-dash text-center">Terakhir Diverifikasi</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th class="d-none d-md-table-cell">Pengaju</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($lastVerifikasi as $index => $permohonan): ?>
                                <tr>
                                    <td><?= ++$index ?></td>
                                    <td><?= Carbon::createFromFormat('Y-m-d H:m:s', $permohonan->tanggal)->locale('id')->diffForHumans() ?></td>
                                    <td class="d-none d-md-table-cell"><?= $permohonan->nama_lengkap ?></td>
                                    <td>
                                        <?php if ($permohonan->status == 'SUDAH DIPROSES'): ?>
                                            <span class="badge badge-success"><?= $permohonan->status ?></span>
                                        <?php else: ?>
                                            <span class="badge badge-danger"><?= $permohonan->status ?></span>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection() ?>

<?= $this->section('scripts') ?>
    <script>
        // $(document).ready(function() {
        //     $('.dashboardTable').DataTable({
        //         "paging": false,
        //         "searching": false,
        //         "ordering": false,
        //         "lengthChange": false,
        //         "info": false,
        //     });
        // });
    </script>
<?php $this->endSection() ?>