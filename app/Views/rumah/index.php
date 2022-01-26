<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <?php if (count($rumahs)): ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Pencahayaan</th>
                                <th>Jenis Atap</th>
                                <th>Kondisi Atap</th>
                                <th>Jenis Dinding</th>
                                <th>Kondisi Dinding</th>
                                <th>Jenis Lantai</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($rumahs as $rumah): ?>
                                <tr>
                                    <td><?= $rumah->id ?></td>
                                    <td><?= $rumah->nama ?></td>
                                    <td><?= $rumah->pencahayaan ?></td>
                                    <td><?= $rumah->jenis_atap ?></td>
                                    <td><?= $rumah->kondisi_atap ?></td>
                                    <td><?= $rumah->jenis_dinding ?></td>
                                    <td><?= $rumah->kondisi_dinding ?></td>
                                    <td><?= $rumah->jenis_lantai ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary lihatBtn" href="#">Lihat</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
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
