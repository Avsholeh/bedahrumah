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
                            <th class="d-none">ID</th>
                            <th>Tanggal</th>
                            <th>Nama Pengaju</th>
                            <th>No.KTP</th>
                            <th>Alamat</th>
                            <th class="d-none">Sektor Pekerjaan</th>
                            <th class="d-none">Penghasilan</th>
                            <th class="d-none">Pengeluaran</th>
                            <th class="d-none">Status Kepemilikan Tanah</th>
                            <th class="d-none">Status Kepemilikan Rumah</th>
                            <th class="d-none">Bukti Kepemilikan Tanah</th>
                            <th class="d-none">Aset Rumah</th>
                            <th class="d-none">Aset Tanah</th>
                            <th>Status</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $pengajuan): ?>
                            <tr>
                                <td class="d-none"><?= $pengajuan->id ?></td class="d-none">
                                <td><?= $pengajuan->tanggal ?></td>
                                <td><?= $pengajuan->nama ?></td>
                                <td><?= $pengajuan->no_ktp ?></td>
                                <td><?= $pengajuan->alamat ?></td>
                                <td class="d-none"><?= $pengajuan->sektor_pekerjaan ?></td>
                                <td class="d-none"><?= $pengajuan->penghasilan ?></td>
                                <td class="d-none"><?= $pengajuan->pengeluaran ?></td>
                                <td class="d-none"><?= $pengajuan->status_pemilik_tanah ?></td>
                                <td class="d-none"><?= $pengajuan->status_pemilik_rumah ?></td>
                                <td class="d-none"><?= $pengajuan->bukti_pemilik_tanah ?></td>
                                <td class="d-none"><?= $pengajuan->aset_rumah ?></td>
                                <td class="d-none"><?= $pengajuan->aset_tanah ?></td>
                                <td><label class="badge badge-warning"><?= $pengajuan->status ?></label></td>
                                <td>
                                    <a class="btn btn-sm btn-inverse-success lihatBtn" href="#">Lihat</a>
                                    <a class="btn btn-sm btn-inverse-danger" href="#">Edit</a>
                                    <a class="btn btn-sm btn-inverse-primary" href="#">Verifikasi</a>
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
                <h5 class="modal-title">Modal title</h5>
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
    var lihatModal = new bootstrap.Modal(document.getElementById('lihatModal'), {}); //document.getElementById('lihatModal')
    var titleModal = $(".modal-title");
    var bodyModal = $(".modal-body");
    var lihatBtn = $(".lihatBtn");
    var tableHead = $(".table > thead > tr").children();

    lihatBtn.click(function () {
        lihatModal.show();
        var tableBody = $(this).parent().siblings();
        titleModal.text(tableBody[2].textContent);
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
