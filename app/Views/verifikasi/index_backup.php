<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

    <ul class="nav nav-pills border-0">
        <li class="nav-item">
            <a class="nav-link active" href="#">Tertinggi</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">Terendah</a>
        </li>
    </ul>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tanggal</th>
                            <th class="data-pengaju">Pengaju</th>
                            <th class="d-none data-pengaju">No.KTP</th>
                            <th class="d-none data-pengaju">No.KK</th>
                            <th class="d-none data-pengaju">Jenis Kelamin</th>
                            <th class="d-none data-pengaju">Tempat Lahir</th>
                            <th class="d-none data-pengaju">Tgl Lahir</th>
                            <th class="d-none data-pengaju">Alamat</th>
                            <th class="d-none data-pengaju">Sektor Pekerjaan</th>
                            <th class="d-none data-pengaju">Penghasilan</th>
                            <th class="d-none data-pengaju">Pengeluaran</th>
                            <th class="d-none data-pengaju">Status Kepemilikan Tanah</th>
                            <th class="d-none data-pengaju">Status Kepemilikan Rumah</th>
                            <th class="d-none data-pengaju">Bukti Kepemilikan Tanah</th>
                            <th class="d-none data-pengaju">Aset Rumah</th>
                            <th class="d-none data-pengaju">Aset Tanah</th>

                            <th class="data-rumah">Pencahayaan</th>
                            <th class="data-rumah">Jenis Atap</th>
                            <th class="data-rumah">Kondisi Atap</th>
                            <th class="data-rumah">Jenis Dinding</th>
                            <th class="data-rumah">Kondisi Dinding</th>
                            <th class="data-rumah">Jenis Lantai</th>

                            <th>Skor</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($data as $permohonan): ?>
                            <tr>
                                <td><?= $permohonan->id_permohonan ?></td>
                                <td><?= $permohonan->tanggal ?></td>
                                <td class="data-pengaju"><?= $permohonan->nama ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->no_ktp ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->no_kk ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->jenis_kelamin ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->tempat_lahir ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->tgl_lahir ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->alamat ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->sektor_pekerjaan ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->penghasilan ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->pengeluaran ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->status_pemilik_tanah ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->status_pemilik_rumah ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->bukti_pemilik_tanah ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->aset_rumah ?></td>
                                <td class="d-none data-pengaju"><?= $permohonan->aset_tanah ?></td>

                                <td class="data-rumah"><?= $permohonan->pencahayaan ?></td>
                                <td class="data-rumah"><?= $permohonan->jenis_atap ?></td>
                                <td class="data-rumah"><?= $permohonan->kondisi_atap ?></td>
                                <td class="data-rumah"><?= $permohonan->jenis_dinding ?></td>
                                <td class="data-rumah"><?= $permohonan->kondisi_dinding ?></td>
                                <td class="data-rumah"><?= $permohonan->jenis_lantai ?></td>
                                <td class="data-rumah"><?= $permohonan->skor ?></td>

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
                                    <a class="btn btn-sm btn-warning"
                                       href="<?= base_url('permohonan/edit/' . $permohonan->id_permohonan) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger"
                                       href="<?= base_url('permohonan/hapus/' . $permohonan->id_permohonan) ?>">Hapus</a>
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
    <div class="modal-dialog modal-lg">
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

    lihatBtn.click(function () {
        lihatModal.show();

        var tableHeadPengaju = $(".table > thead > tr").children('.data-pengaju');
        var tableBodyPengaju = $(this).parent().siblings('.data-pengaju');
        var htmlModal = "<div class='row'><div class='col-6'>";
        for (var i = 0; i < tableHeadPengaju.length - 1; i++) {
            htmlModal += `
            <div class='row mb-3'>
                <div class='col-6'><strong>${tableHeadPengaju[i].textContent}</strong></div>
                <div class='col-6'>: ${tableBodyPengaju[i].innerText}</div>
            </div>
            `;
        }

        htmlModal += "</div>";

        var tableHeadRumah = $(".table > thead > tr").children('.data-rumah');
        var tableBodyRumah = $(this).parent().siblings('.data-rumah');
        htmlModal += "<div class='col-6'>";
        for (var i = 0; i < tableHeadRumah.length - 1; i++) {
            htmlModal += `
            <div class='row mb-3'>
                <div class='col-6'><strong>${tableHeadRumah[i].textContent}</strong></div>
                <div class='col-6'>: ${tableBodyRumah[i].innerText}</div>
            </div>
            `;
        }

        htmlModal += "</div></div>";

        bodyModal.html(htmlModal);
    });
</script>
<?php $this->endSection() ?>