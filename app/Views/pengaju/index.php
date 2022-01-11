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
                            <th>No.KTP</th>
                            <th>No.KK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tgl Lahir</th>
                            <th>Alamat</th>
                            <th class="d-none">Sektor Pekerjaan</th>
                            <th class="d-none">Penghasilan</th>
                            <th class="d-none">Pengeluaran</th>
                            <th class="d-none">Status Kepemilikan Tanah</th>
                            <th class="d-none">Status Kepemilikan Rumah</th>
                            <th class="d-none">Bukti Kepemilikan Tanah</th>
                            <th class="d-none">Aset Rumah</th>
                            <th class="d-none">Aset Tanah</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $pengaju): ?>
                            <tr>
                                <td><?= $pengaju->id ?></td>
                                <td><?= $pengaju->nama ?></td>
                                <td><?= $pengaju->no_ktp ?></td>
                                <td><?= $pengaju->no_kk ?></td>
                                <td><?= $pengaju->jenis_kelamin ?></td>
                                <td><?= $pengaju->tempat_lahir ?></td>
                                <td><?= $pengaju->tgl_lahir ?></td>
                                <td><?= $pengaju->alamat ?></td>
                                <td class="d-none"><?= $pengaju->sektor_pekerjaan ?></td>
                                <td class="d-none"><?= $pengaju->penghasilan ?></td>
                                <td class="d-none"><?= $pengaju->pengeluaran ?></td>
                                <td class="d-none"><?= $pengaju->status_pemilik_tanah ?></td>
                                <td class="d-none"><?= $pengaju->status_pemilik_rumah ?></td>
                                <td class="d-none"><?= $pengaju->bukti_pemilik_tanah ?></td>
                                <td class="d-none"><?= $pengaju->aset_rumah ?></td>
                                <td class="d-none"><?= $pengaju->aset_tanah ?></td>
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
