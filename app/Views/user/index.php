<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>



<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col">
                        <a class="btn btn-primary" href="<?= base_url('users/tambah')?>">
                            <i class="icon icon-plus me-2"></i>Tambah
                        </a>
                    </div>
                </div>

                <div class="table-responsive-lg">
                    <table class="table cell-border dtable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th>JABATAN</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $user->id ?></td>
                                <td><?= $user->nama_lengkap ?></td>
                                <td><?= $user->email ?></td>
                                <td>
                                    <?php if ($user->status == 1): ?>
                                        <span class="badge badge-success">Aktif</span>
                                    <?php endif ?>

                                    <?php if ($user->status == 0): ?>
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                    <?php endif ?>
                                </td>
                                <td><?= $user->jabatan ?></td>
                                <td>
                                    <a class="btn btn-sm btn-warning"
                                       href="<?= base_url('users/edit/' . $user->id) ?>">Edit</a>
                                    <a class="btn btn-sm btn-danger hapusBtn"
                                       href="#" data-hapus="<?= base_url('users/hapus/' . $user->id) ?>">Hapus</a>
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

<!-- HapusModal -->
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
    var lihatModal = new bootstrap.Modal(document.getElementById('lihatModal'), {});
    var titleModal = $(".modal-title");
    var bodyModal = $(".modal-body");
    var lihatBtn = $(".lihatBtn");
    var tableHead = $(".table > thead > tr").children();

    var hapusBtn = $(".hapusBtn");
    var hapusModal = new bootstrap.Modal(document.getElementById('hapusModal'), {});

    hapusBtn.click(function(event) {
        hapusModal.show();
        $('.btnModalHapus').click(function() {
            window.location = $(event.target).data('hapus');
        });
    });

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
