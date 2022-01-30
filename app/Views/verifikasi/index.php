<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!--<ul class="nav nav-pills border-0">-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link --><?//= url_is('verifikasi/tertinggi') ? 'active' : '' ?><!--"-->
<!--           href="--><?//= base_url('verifikasi/tertinggi') ?><!--">-->
<!--            Skor Tertinggi-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link --><?//= url_is('verifikasi/terendah') ? 'active' : '' ?><!--"-->
<!--           href="--><?//= base_url('verifikasi/terendah') ?><!--">-->
<!--            Skor Terendah-->
<!--        </a>-->
<!--    </li>-->
<!--</ul>-->

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
                                <th class="data-pengaju">NAMA</th>
                                <th class="d-none data-pengaju">NO KTP</th>
                                <th class="d-none data-pengaju">NO KK</th>
                                <th class="d-none data-pengaju">JENIS KELAMIN</th>
                                <th class="d-none data-pengaju">TEMPAT LAHIR</th>
                                <th class="d-none data-pengaju">TANGGAL LAHIR</th>
                                <th class="d-none data-pengaju">ALAMAT</th>
                                <th class="d-none data-pengaju">PENGHASILAN</th>
                                <th class="d-none data-pengaju">PENGELUARAN</th>
                                <th class="d-none data-pengaju">STATUS TANAH</th>
                                <th class="d-none data-pengaju">STATUS RUMAH</th>
                                <th class="d-none data-pengaju">BUKTI PEMILIK TANAH</th>
                                <th class="d-none data-pengaju">ASET RUMAH</th>
                                <th class="d-none data-pengaju">ASET TANAH</th>
                                <th class="data-rumah">TOTAL SKOR</th>
                                <th class="data-rumah">STATUS</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($permohonans as $permohonan): ?>
                                <tr>
                                    <td class="d-none"><?= $permohonan['id_permohonan'] ?></td>
                                    <td><?= $permohonan['tanggal'] ?></td>
                                    <td class="data-pengaju"><?= $permohonan['nama'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['no_ktp'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['no_kk'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['jenis_kelamin'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['tempat_lahir'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['tgl_lahir'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['alamat'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['penghasilan'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['pengeluaran'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['status_pemilik_tanah'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['status_pemilik_rumah'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['bukti_pemilik_tanah'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['aset_rumah'] ?></td>
                                    <td class="d-none data-pengaju"><?= $permohonan['aset_tanah'] ?></td>
                                    <td>
                                        <?php foreach ($skors as $skor): ?>
                                            <?php if ($skor['id_permohonan'] == $permohonan['id']): ?>
                                                <?= $skor['total_bobot']?>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </td>
                                    <td>
                                        <?php if ($permohonan['status'] === 'BELUM DIPROSES'): ?>
                                            <form action="<?= base_url('verifikasi/proses') ?>" method="POST"
                                                  enctype="multipart/form-data" autocomplete="off" class="d-inline">
                                                <input type="hidden" name="id_permohonan"
                                                       value="<?= $permohonan['id_permohonan'] ?>">
                                                <input type="submit" class="btn btn-sm btn-success"
                                                       value="Verifikasi">
                                            </form>
                                        <?php else: ?>
                                            <label class="badge badge-success">
                                                <strong><?= $permohonan['status'] ?></strong>
                                            </label>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary fotoBtn"
                                           data-foto="<?= $permohonan['id_permohonan'] ?>"
                                           href="#">Foto</a>
                                        <a class="btn btn-sm btn-primary lihatBtn"
                                           data-id-permohonan="<?= $permohonan['id_permohonan'] ?>"
                                           href="#">Lihat</a>
                                        <a class="btn btn-sm btn-warning"
                                           href="<?= base_url('permohonan/edit/' . $permohonan['id_permohonan']) ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger hapusBtn"
                                           data-hapus="<?= base_url('permohonan/hapus/' . $permohonan['id_permohonan']) ?>"
                                           href="#">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="d-flex justify-content-center align-items-center flex-column my-5">
                        <img src="<?= base_url('public/images/empty.png') ?>" width="400">
                        <h4>Belum ada permohonan yang diajukan.</h4>
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

<div class="modal fade" id="hapusModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Apakah anda yakin ingin menghapus ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btnModalHapus">Ya</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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

        var hapusBtn = $(".hapusBtn");
        var hapusModal = new bootstrap.Modal(document.getElementById('hapusModal'), {});

        var fotoBtn = $(".fotoBtn");
        var fotoModal = new bootstrap.Modal(document.getElementById('fotoModal'), {});
        var fotoModalBody = $("#fotoModalBody");

        lihatBtn.click(function (event) {
            lihatModal.show();

            var tableHead = $(".table > thead > tr");
            var tableHeadPengaju = tableHead.children('.data-pengaju');
            var tableBodyPengaju = $(this).parent().siblings('.data-pengaju');
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
            console.log(idPermohonan);
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

        document.getElementById('lihatModal').addEventListener('hidden.bs.modal', function (event) {
            lihatModalBody.html("");
        })

        hapusBtn.click(function (event) {
            hapusModal.show();
            $('.btnModalHapus').click(function () {
                window.location = $(event.target).data('hapus');
            });
        });

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
    });


</script>
<?php $this->endSection() ?>

