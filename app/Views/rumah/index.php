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
                                <th>Jumlah Penghuni</th>
                                <th>Luas Rumah</th>
                                <th>Luas Lantai</th>
                                <th>Tinggi Bangunan</th>
                                <th>Material Atap</th>
                                <th>Material Dinding</th>
                                <th>Material Lantai</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $rumah): ?>
                                <tr>
                                    <td><?= $rumah->nama ?></td>
                                    <td><?= $rumah->jumlah_penghuni ?></td>
                                    <td><?= $rumah->luas_rumah ?></td>
                                    <td><?= $rumah->luas_lantai ?></td>
                                    <td><?= $rumah->tinggi_bangunan ?></td>
                                    <td><?= $rumah->material_atap ?></td>
                                    <td><?= $rumah->material_dinding ?></td>
                                    <td><?= $rumah->material_lantai ?></td>
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