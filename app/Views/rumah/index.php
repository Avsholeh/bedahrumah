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
                            <th>ID</th>
                            <th>Pengaju</th>
                            <th>Jml.Penghuni</th>
                            <th>Luas Rumah</th>
                            <th>Luas Lantai</th>
                            <th>Tinggi Bangunan
                            <th>Luas Lantai</th>
                            <th class="d-none">Pondasi</th>
                            <th class="d-none">Kolom dan Balok</th>
                            <th class="d-none">Konstruksi Atap</th>
                            <th class="d-none">Pencahayaan</th>
                            <th class="d-none">Ventilasi</th>
                            <th class="d-none">MCK</th>
                            <th class="d-none">Kondisi MCK</th>
                            <th class="d-none">Pembuangan Air</th>
                            <th class="d-none">Kondisi Pembuangan Air</th>
                            <th class="d-none">Sumber Air Minum</th>
                            <th class="d-none">Sumber Listrik</th>
                            <th class="d-none">Material Atap</th>
                            <th class="d-none">Kondisi Atap</th>
                            <th class="d-none">Material Dinding</th>
                            <th class="d-none">Kondisi Dinding</th>
                            <th class="d-none">Material Lantai</th>
                            <th class="d-none">Kondisi Lantai</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $rumah): ?>
                            <tr>
                                <td><?= $rumah->id ?></td>
                                <td><?= $rumah->nama ?></td>
                                <td><?= $rumah->jumlah_penghuni ?></td>
                                <td><?= $rumah->luas_rumah ?></td>
                                <td><?= $rumah->luas_lantai ?></td>
                                <td><?= $rumah->tinggi_bangunan ?></td>
                                <td><?= $rumah->luas_lantai ?></td>
                                <td class="d-none"><?= $rumah->pondasi ?></td>
                                <td class="d-none"><?= $rumah->kolom_balok ?></td>
                                <td class="d-none"><?= $rumah->konstruksi_atap ?></td>
                                <td class="d-none"><?= $rumah->pencahayaan ?></td>
                                <td class="d-none"><?= $rumah->ventilasi ?></td>
                                <td class="d-none"><?= $rumah->mck ?></td>
                                <td class="d-none"><?= $rumah->kondisi_mck ?></td>
                                <td class="d-none"><?= $rumah->pembuangan ?></td>
                                <td class="d-none"><?= $rumah->kondisi_pembuangan ?></td>
                                <td class="d-none"><?= $rumah->sumber_air_minum ?></td>
                                <td class="d-none"><?= $rumah->sumber_listrik ?></td>
                                <td class="d-none"><?= $rumah->material_atap ?></td>
                                <td class="d-none"><?= $rumah->kondisi_atap ?></td>
                                <td class="d-none"><?= $rumah->material_dinding ?></td>
                                <td class="d-none"><?= $rumah->kondisi_dinding ?></td>
                                <td class="d-none"><?= $rumah->material_lantai ?></td>
                                <td class="d-none"><?= $rumah->kondisi_lantai ?></td>
                                <td>
                                    <a class="btn btn-sm btn-primary lihatBtn" href="#">Lihat</a>
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

<!-- Modal -->
<div class="modal fade" id="lihatModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>


<?= $this->section('scripts') ?>
<script>
    var lihatModal = new bootstrap.Modal(document.getElementById('lihatModal'), {});
    var titleModal = $(".modal-title");
    var bodyModal = $(".modal-body");
    var lihatBtn = $(".lihatBtn");
    var tableHead = $(".table > thead > tr").children();

    lihatBtn.click(function () {
        lihatModal.show();
        var tableBody = $(this).parent().siblings();
        var htmlModal = "";
        for (var i = 0; i < tableHead.length - 1; i++) {
            htmlModal += `
            <div class='row mb-3'>
                <div class='col-6'><strong>${tableHead[i].textContent}</strong></div>
                <div class='col-6'>: ${tableBody[i].textContent}</div>
            </div>
            `;
        }
        bodyModal.html(htmlModal);
    });
</script>
<?php $this->endSection() ?>
