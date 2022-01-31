<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<ul class="nav nav-pills border-0">
    <li class="nav-item">
        <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#filter">
            <i class="icon icon-arrow-down"></i>
        </a>
    </li>
<!--    <li class="nav-item">-->
<!--        <a class="nav-link --><?//= url_is('permohonan/tertinggi') ? 'active' : '' ?><!--"-->
<!--           href="--><?//= base_url('permohonan/tertinggi') ?><!--">-->
<!--            Skor Tertinggi-->
<!--        </a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link --><?//= url_is('permohonan/terendah') ? 'active' : '' ?><!--"-->
<!--           href="--><?//= base_url('permohonan/terendah') ?><!--">-->
<!--            Skor Terendah-->
<!--        </a>-->
<!--    </li>-->
</ul>

<div class="row">
    <div class="col-md-4">
        <div class="collapse" id="filter">
            <div class="card card-body mb-3">
                <form action="<?= base_url('permohonan') ?>" method="post">
                    <div class="form-group">
                        <select class="form-select" name="urutan">
                            <option value="" selected disabled>Pilih jenis urutan</option>
                            <option value="desc">Tertinggi</option>
                            <option value="asc">Terendah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="jumlah_data" class="form-control" placeholder="Jumlah Data">
                    </div>
                    <input class="btn btn-primary btn-sm" type="submit" value="Tampilkan">
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a class="btn btn-primary" href="<?= base_url('permohonan/tambah') ?>">
                            <i class="icon icon-plus me-2"></i>Tambah
                        </a>
                    </div>
                </div>

                <?php if (count($data)): ?>
                    <div class="table-responsive-lg">
                        <table class="table dtable">
                            <thead>
                            <tr>
                                <th class="show-info">ID</th>
                                <th class="show-info">TANGGAL</th>
                                <th class="show-info">NAMA</th>
                                <th class="d-none show-info">NO KTP</th>
                                <th class="d-none show-info">NO KK</th>
                                <th class="d-none show-info">JENIS KELAMIN</th>
                                <th class="d-none show-info">TEMPAT LAHIR</th>
                                <th class="d-none show-info">TANGGAL LAHIR</th>
                                <th class="show-info">SKOR</th>
                                <th class="show-info">STATUS</th>
                                <th>INFO PELAPOR</th>
                                <th>INFO RUMAH</th>
                                <th class="d-none show-info">ALAMAT</th>
                                <th class="d-none show-info">PENGHASILAN</th>
                                <th class="d-none show-info">PENGELUARAN</th>
                                <th class="d-none show-info">STATUS TANAH</th>
                                <th class="d-none show-info">STATUS RUMAH</th>
                                <th class="d-none show-info">BUKTI PEMILIK TANAH</th>
                                <th class="d-none show-info">ASET RUMAH</th>
                                <th class="d-none show-info">ASET TANAH</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $permohonan): ?>
                                <tr>
                                    <td class="show-info"><?= $permohonan['id'] ?></td>
                                    <td class="show-info"><?= $permohonan['tanggal'] ?></td>
                                    <td class="show-info"><?= $permohonan['nama'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['no_ktp'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['no_kk'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['jenis_kelamin'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['tempat_lahir'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['tgl_lahir'] ?></td>
                                    <td class="show-info"><?= $permohonan['total_skor'] ?></td>
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
                                    <td class="d-none show-info"><?= $permohonan['alamat'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['penghasilan'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['pengeluaran'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['status_pemilik_tanah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['status_pemilik_rumah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['bukti_pemilik_tanah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['aset_rumah'] ?></td>
                                    <td class="d-none show-info"><?= $permohonan['aset_tanah'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary lihatBtn" href="#">Lihat</a>
                                        <a class="btn btn-sm btn-warning"
                                           href="<?= base_url('permohonan/edit/' . $permohonan['id']) ?>">Edit</a>
                                        <a class="btn btn-sm btn-danger hapusBtn"
                                           data-hapus="<?= base_url('permohonan/hapus/' . $permohonan['id']) ?>"
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
                        <h4>Data pengaju masih kosong.</h4>
                    </div>
                <?php endif ?>
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
    var lihatModal = new bootstrap.Modal(document.getElementById('lihatModal'), {});
    var lihatModalBody = $("#lihatModal .modal-body");
    var lihatBtn = $(".lihatBtn");

    lihatBtn.click(function () {
        lihatModal.show();
        var tableHead = $(".table > thead > tr").children('.show-info');
        var tableBody = $(this).parent().siblings('.show-info');
        var htmlModal = "";
        for (var i = 0; i < tableHead.length - 1; i++) {
            htmlModal += `
            <div class='row mb-3'>
                <div class='col-6'><strong>${tableHead[i].textContent}</strong></div>
                <div class='col-6'>: ${tableBody[i].textContent}</div>
            </div>
            `;
        }
        lihatModalBody.html(htmlModal);
    });
    document.getElementById('lihatModal').addEventListener('hidden.bs.modal', function (event) {
        lihatModalBody.html("");
    });

    var hapusBtn = $(".hapusBtn");
    var hapusModal = new bootstrap.Modal(document.getElementById('hapusModal'), {});
    hapusBtn.click(function (event) {
        hapusModal.show();
        $('.btnModalHapus').click(function () {
            window.location = $(event.target).data('hapus');
        });
    });

    var skorBtn = $(".skorBtn");
    var skorModal = new bootstrap.Modal(document.getElementById('skorModal'), {});
    var skorModalBody = $("#skorModal .modal-body");

    document.getElementById('skorModal').addEventListener('hidden.bs.modal', function (event) {
        skorModalBody.html("");
    })
    skorBtn.click(function (event) {
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

    var pelaporBtn = $(".pelaporBtn");
    var pelaporModal = new bootstrap.Modal(document.getElementById('pelaporModal'), {});
    var pelaporModalBody = $("#pelaporModal .modal-body");
    document.getElementById('pelaporModal').addEventListener('hidden.bs.modal', function (event) {
        pelaporModalBody.html("");
    })
    pelaporBtn.click(function (event) {
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
