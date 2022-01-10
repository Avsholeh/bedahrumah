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
                            <th>Tanggal</th>
                            <th>Pengaju</th>
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
                        <?php foreach ($data as $permohonan): ?>
                            <tr>
                                <td><?= $permohonan->id_permohonan ?></td class="d-none">
                                <td><?= $permohonan->tanggal ?></td>
                                <td><?= $permohonan->nama ?></td>
                                <td><?= $permohonan->no_ktp ?></td>
                                <td><?= $permohonan->alamat ?></td>
                                <td class="d-none"><?= $permohonan->sektor_pekerjaan ?></td>
                                <td class="d-none"><?= $permohonan->penghasilan ?></td>
                                <td class="d-none"><?= $permohonan->pengeluaran ?></td>
                                <td class="d-none"><?= $permohonan->status_pemilik_tanah ?></td>
                                <td class="d-none"><?= $permohonan->status_pemilik_rumah ?></td>
                                <td class="d-none"><?= $permohonan->bukti_pemilik_tanah ?></td>
                                <td class="d-none"><?= $permohonan->aset_rumah ?></td>
                                <td class="d-none"><?= $permohonan->aset_tanah ?></td>
                                <?php if ($permohonan->status === 'BELUM DIPROSES'): ?>
                                    <td>
                                        <form action="<?= base_url('verifikasi/proses') ?>" method="POST"
                                              enctype="multipart/form-data" autocomplete="off" class="d-inline">
                                            <input type="hidden" name="id_permohonan"
                                                   value="<?= $permohonan->id_permohonan ?>">
                                            <input type="submit" class="btn btn-sm btn-success"
                                                   value="Verifikasi">
                                        </form>
                                    </td>
                                <?php else: ?>
                                    <td><label class="badge badge-primary">
                                            <strong><?= $permohonan->status ?></strong>
                                        </label></td>
                                <?php endif; ?>
                                <td>
                                    <a class="btn btn-sm btn-primary lihatBtn" href="#">Lihat</a>
                                    <a class="btn btn-sm btn-warning" href="<?= base_url('permohonan/edit/' . $permohonan->id_permohonan) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger" href="<?= base_url('permohonan/hapus/' . $permohonan->id_permohonan) ?>">Hapus</a>
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
