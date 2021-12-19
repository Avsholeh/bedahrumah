<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nama Pengaju</th>
                                <th>No.KTP</th>
                                <th>No.KK</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat Lahir</th>
                                <th>Tgl Lahir</th>
                                <th>Alamat</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $pengaju): ?>
                                <tr>
                                    <td><?= $pengaju->nama ?></td>
                                    <td><?= $pengaju->no_ktp ?></td>
                                    <td><?= $pengaju->no_kk ?></td>
                                    <td><?= $pengaju->jenis_kelamin ?></td>
                                    <td><?= $pengaju->tempat_lahir ?></td>
                                    <td><?= $pengaju->tgl_lahir ?></td>
                                    <td><?= $pengaju->alamat ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-inverse-primary" href="#">Selengkapnya</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endSection() ?>