<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<?php $validation = \Config\Services::validation(); ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="indikator-tab" data-bs-toggle="tab"
                                href="#indikator" data-bs-target="#indikator" type="button">
                            <strong>Indikator</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="atribut-tab" data-bs-toggle="tab"
                                href="#atribut" data-bs-target="#atribut" type="button">
                            <strong>Atribut</strong>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="indikator">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <form action="<?= base_url('skoring/indikator') ?>" method="post">
                                            <div class="form-group">
                                                <label class="form-label">Nama Indikator</label>
                                                <input class="form-control" type="text" name="indikator"
                                                       placeholder="Nama Indikator">
                                                <?php if ($error = $validation->getError('indikator')): ?>
                                                    <small class="text-danger"><?= $error ?></small>
                                                <?php endif ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Bobot Indikator</label>
                                                <input class="form-control" type="number" name="bobot"
                                                       placeholder="Bobot">
                                                <?php if ($error = $validation->getError('bobot')): ?>
                                                    <small class="text-danger"><?= $error ?></small>
                                                <?php endif ?>
                                            </div>
                                            <input class="btn btn-primary btn-sm" type="submit" value="Tambah">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <?php if (count($indikator)): ?>
                                    <div class="table-responsive">
                                        <table id="tableIndikator" class="table table-bordered dataTable">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>INDIKATOR</th>
                                                <th>BOBOT</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($indikator as $i): ?>
                                                <tr>
                                                    <td><?= $i->id ?></td>
                                                    <td><?= $i->indikator ?></td>
                                                    <td><?= $i->bobot ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center align-items-center flex-column my-5">
                                        <img src="<?= base_url('public/images/empty.png') ?>" width="400">
                                        <h4>Data rumah masih kosong.</h4>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="atribut">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="card rounded-0">
                                    <div class="card-body">
                                        <form action="<?= base_url('skoring/atribut') ?>" method="post">
                                            <div class="form-group">
                                                <label class="form-label">Indikator</label>
                                                <select class="form-select" name="id_indikator">
                                                    <option value="" disabled selected>Pilih Indikator</option>
                                                    <?php foreach ($indikator as $i): ?>
                                                        <option value="<?= $i->id ?>"><?= $i->indikator ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php if ($error = $validation->getError('id_indikator')): ?>
                                                    <small class="text-danger"><?= $error ?></small>
                                                <?php endif ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Nama Atribut</label>
                                                <input class="form-control" type="text" name="atribut"
                                                       placeholder="Nama Atribut">
                                                <?php if ($error = $validation->getError('atribut')): ?>
                                                    <small class="text-danger"><?= $error ?></small>
                                                <?php endif ?>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label">Bobot Atribut</label>
                                                <input class="form-control" type="number" name="bobot"
                                                       placeholder="Bobot Atribut">
                                                <?php if ($error = $validation->getError('bobot')): ?>
                                                    <small class="text-danger"><?= $error ?></small>
                                                <?php endif ?>
                                            </div>

                                            <input class="btn btn-primary btn-sm" type="submit" value="Tambah">
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8 mb-3">
                                <?php if (count($atribut)): ?>
                                    <div class="table-responsive">
                                        <table id="tableAtribut" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>INDIKATOR</th>
                                                <th>ATRIBUT</th>
                                                <th>BOBOT</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach ($atribut as $a): ?>
                                                <tr>
                                                    <td><?= $a->id ?></td>
                                                    <td><?= $a->indikator ?></td>
                                                    <td><?= $a->atribut ?></td>
                                                    <td><?= $a->bobot ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php else: ?>
                                    <div class="d-flex justify-content-center align-items-center flex-column my-5">
                                        <img src="<?= base_url('public/images/empty.png') ?>" width="400">
                                        <h4>Data rumah masih kosong.</h4>
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
