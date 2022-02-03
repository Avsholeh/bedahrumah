<?php

use Carbon\Carbon;

?>
<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php if (count($permohonans)): ?>
                    <div class="table-responsive-lg">
                        <table class="table cell-border dtable" style="width:100%">
                            <thead>
                            <tr>
                                <th class="d-none">ID</th>
                                <th>TANGGAL</th>
                                <th class="show-info">NAMA</th>
                                <th class="d-none show-info">NO KTP</th>
                                <th class="d-none show-info">NO KK</th>
                                <th class="d-none show-info">JENIS KELAMIN</th>
                                <th class="d-none show-info">TEMPAT LAHIR</th>
                                <th class="d-none show-info">TANGGAL LAHIR</th>
                                <th class="d-none show-info">ALAMAT</th>
                                <th class="d-none show-info">PENGHASILAN</th>
                                <th class="d-none show-info">PENGELUARAN</th>
                                <th class="d-none show-info">STATUS TANAH</th>
                                <th class="d-none show-info">STATUS RUMAH</th>
                                <th class="d-none show-info">BUKTI PEMILIK TANAH</th>
                                <th class="d-none show-info">ASET RUMAH</th>
                                <th class="d-none show-info">ASET TANAH</th>
                                <th class="data-rumah">SKOR</th>
                                <th class="data-rumah">STATUS</th>
                                <th>INFO PELAPOR</th>
                                <th>INFO RUMAH</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($permohonans as $permohonan): ?>
                                <tr>
                                    <td class="d-none"><?= $permohonan['id_permohonan'] ?></td>
                                    <td><?= Carbon::createFromFormat('Y-m-d H:i:s', $permohonan['tanggal'])->locale('id')->isoFormat('dddd, DD MMMM YYYY') ?></td>
                                    <td class="show-info"><?= $permohonan['nama'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['no_ktp'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['no_kk'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['jenis_kelamin'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['tempat_lahir'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['tgl_lahir'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['alamat'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['penghasilan'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['pengeluaran'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['status_pemilik_tanah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['status_pemilik_rumah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['bukti_pemilik_tanah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['aset_rumah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['aset_tanah'] ?></td>
                                    <td>
                                        <?php foreach ($skors as $skor): ?>
                                            <?php if ($skor['id_permohonan'] == $permohonan['id']): ?>
                                                <?= $skor['total_bobot']?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td class="show-info">
                                        <?php if ($permohonan['status'] === 'BELUM DIPROSES'): ?>
                                            <label class="badge badge-danger">
                                                <strong><?= $permohonan['status'] ?></strong>
                                            </label>
                                        <?php else: ?>
                                            <label class="badge badge-success">
                                                <strong><?= $permohonan['status'] ?></strong>
                                            </label>
                                        <?php endif; ?>
                                    </td>
                                    <td><!-- INFO PELAPOR -->
                                        <button
                                                data-id-permohonan="<?= $permohonan['id'] ?>"
                                                class="btn btn-inverse-primary btn-sm pelaporBtn">
                                            Tampilkan
                                        </button>
                                    </td>
                                    <td><!-- INFO RUMAH-->
                                        <button
                                                data-id-permohonan="<?= $permohonan['id'] ?>"
                                                class="btn btn-inverse-primary btn-sm skorBtn">
                                            Tampilkan
                                        </button>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('verifikasi/proses') ?>" method="POST"
                                              enctype="multipart/form-data" autocomplete="off" class="d-inline">
                                            <input type="hidden" name="id_permohonan"
                                                   value="<?= $permohonan['id_permohonan'] ?>">
                                            <input type="submit" class="btn btn-sm btn-success"
                                                   value="Verifikasi">
                                        </form>
                                        <a class="btn btn-sm btn-primary fotoBtn"
                                           data-foto="<?= $permohonan['id_permohonan'] ?>"
                                           href="#">Foto</a>
                                        <a class="btn btn-sm btn-primary lihatBtn"
                                           data-id-permohonan="<?= $permohonan['id_permohonan'] ?>"
                                           href="#">Lihat</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="d-flex justify-content-center align-items-center flex-column my-5">
                        <img src="<?= base_url('public/images/empty.png') ?>" width="400">
                        <h4>Belum ada permohonan yang belum diverifikasi.</h4>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

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

<div class="modal fade" id="fotoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="fotoModalBody" class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="skorModal" tabindex="-1">
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

<div class="modal fade" id="pelaporModal" tabindex="-1">
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
    $(document).ready(function () {
        var lihatBtn = $(".lihatBtn");
        var lihatModal = new bootstrap.Modal(document.getElementById('lihatModal'), {});
        var lihatModalBody = $("#lihatModal .modal-body");

        document.getElementById('lihatModal').addEventListener('hidden.bs.modal', function (event) {
            lihatModalBody.html("");
        })

        lihatBtn.click(function (event) {
            lihatModal.show();
            var tableHead = $(".table > thead > tr");
            var tableHeadPengaju = tableHead.children('.show-info');
            var tableBodyPengaju = $(this).parent().siblings('.show-info');
            var htmlModal = "<div class='row'><div class='col-6'>";
            for (var i = 0; i < tableHeadPengaju.length - 1; i++) {
                htmlModal += `<div class='row mb-3'>
                <div class='col-6'><strong>${tableHeadPengaju[i].textContent}</strong></div>
                <div class='col-6'>: ${tableBodyPengaju[i].innerText}</div>
            </div>
            `;
            }
            htmlModal += "</div>";

            var idPermohonan = $(event.target).data('id-permohonan');
            $.get("<?= base_url('permohonan/skor') ?>/" + idPermohonan,
                function (data, status) {
                    data = JSON.parse(data);
                    htmlModal += "<div class='col-6'>";
                    data.forEach(function (k, v) {
                        htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>${k.indikator.toUpperCase()}</strong></div>
                            <div class='col-6'>: ${k.atribut} (${k.bobot})</div></div>`;
                        console.log(htmlModal)
                    });
                    htmlModal += "</div></div>";
                    lihatModalBody.html(htmlModal);
                }
            );
        });

        var fotoBtn = $(".fotoBtn");
        var fotoModal = new bootstrap.Modal(document.getElementById('fotoModal'), {});
        var fotoModalBody = $("#fotoModalBody");

        fotoBtn.click(function (event) {
            fotoModal.show();
            var idPermohonan = $(event.target).data('foto');
            $.get("<?= base_url('permohonan/gambar') ?>/" + idPermohonan,
                function (data, status) {
                    data = JSON.parse(data);
                    if (data.length) {
                        data.forEach(function (k, v) {
                            var dataGambar = `<h3 class="text-center">${k.jenis}</h3><img class="text-center mb-5"
                             style="display: block;margin-left: auto;margin-right: auto;width: 50%;"
                             width="400" src="data:image/jpeg;base64, ${k.file}"/>`;
                            fotoModalBody.append(dataGambar);
                        });
                    } else {
                        fotoModalBody.append("<h4 class='text-center'>Belum ada gambar yang diupload.</h4>");
                    }
                }
            );
        });

        document.getElementById('fotoModal').addEventListener('hidden.bs.modal', function (event) {
            fotoModalBody.html("");
        })

        var skorBtn = $(".skorBtn");
        var skorModal = new bootstrap.Modal(document.getElementById('skorModal'), {});
        var skorModalBody = $("#skorModal .modal-body");

        document.getElementById('skorModal').addEventListener('hidden.bs.modal', function (event) {
            skorModalBody.html("");
        })
        skorBtn.click(function(event) {
            skorModal.show();
            var htmlModal = "";
            var idPermohonan = $(event.target).data('id-permohonan');
            $.get("<?= base_url('permohonan/skor') ?>/" + idPermohonan,
                function (data, status) {
                    data = JSON.parse(data);
                    htmlModal += "";
                    var totalBobot = 0;
                    data.forEach(function (k, v) {
                        htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>${k.indikator.toUpperCase()}</strong></div>
                            <div class='col-6'>: ${k.atribut} <strong>(${k.bobot})</strong></div></div>`;
                        totalBobot += parseInt(k.bobot);
                    });
                    htmlModal += "<div class='row mb-3'><div class='col-6'><strong>Skor</strong></div>";
                    htmlModal += `<div class='col-6'>: <strong>${totalBobot}</strong></div></div>`;
                    htmlModal += "</div>";
                    skorModalBody.html(htmlModal);
                }
            );
        });
    });

    var pelaporBtn = $(".pelaporBtn");
    var pelaporModal = new bootstrap.Modal(document.getElementById('pelaporModal'), {});
    var pelaporModalBody = $("#pelaporModal .modal-body");
    document.getElementById('pelaporModal').addEventListener('hidden.bs.modal', function (event) {
        pelaporModalBody.html("");
    })
    pelaporBtn.click(function(event) {
        pelaporModal.show();
        var htmlModal = "";
        var idPermohonan = $(event.target).data('id-permohonan');
        $.get("<?= base_url('permohonan/pelapor') ?>/" + idPermohonan,
            function (data, status) {
                data = JSON.parse(data);
                htmlModal += `<div class='row mb-3'>
                            <div class='col-12 text-center'>
                            <img id="preview_ktp" width="400"
                                 src="data:image/jpeg;base64, ${data.ktp}">
                            </div></div>`;
                htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>Nama</strong></div>
                            <div class='col-6'>: ${data.nama_lengkap}</div></div>`;
                htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>Jabatan</strong></div>
                            <div class='col-6'>: ${data.jabatan}</div></div>`;
                htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>Alamat</strong></div>
                            <div class='col-6'>: ${data.alamat}</div></div>`;
                htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>Email</strong></div>
                            <div class='col-6'>: ${data.email}</div></div>`;
                htmlModal += `<div class='row mb-3'>
                            <div class='col-6'><strong>No.Telp</strong></div>
                            <div class='col-6'>: ${data.no_telp}</div></div>`;
                pelaporModalBody.html(htmlModal);
            }
        );
    });
</script>
<?php $this->endSection() ?>

