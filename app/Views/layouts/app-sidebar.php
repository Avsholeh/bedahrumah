<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="icon-home me-2"></i>
                <span class="menu-title fs-6">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="icon-people me-2"></i>
                <span class="menu-title fs-6">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#data-pengaju">
                <i class="menu-icon icon-briefcase"></i>
                <span class="menu-title">Data Pengaju</span>
            </a>
            <div class="collapse" id="data-pengaju">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="#">Lihat</a></li>
                </ul>
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pengaju') ?>">Tambah</a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('rumah') ?>">
                <i class="icon-briefcase me-2"></i>
                <span class="menu-title fs-6">Data Rumah</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('validasi') ?>">
                <i class="icon-briefcase me-2"></i>
                <span class="menu-title fs-6">Validasi</span>
            </a>
        </li>

    </ul>
</nav>
