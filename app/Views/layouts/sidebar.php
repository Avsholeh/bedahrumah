<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="icon-home me-2"></i>
                <span class="menu-title fs-6">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('permohonan') ?>">
                <i class="icon-note me-2"></i>
                <span class="menu-title fs-6">Permohonan</span>
            </a>
        </li>

        <?php if (session('user')['jabatan'] == 'Admin'): ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('verifikasi') ?>">
                    <i class="icon-refresh me-2"></i>
                    <span class="menu-title fs-6">Verifikasi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('skoring') ?>">
                    <i class="icon-bulb me-2"></i>
                    <span class="menu-title fs-6">Skoring</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('laporan') ?>">
                    <i class="icon-printer me-2"></i>
                    <span class="menu-title fs-6">Laporan</span>
                </a>
            </li>
        <?php endif ?>

        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('users') ?>">
                <i class="icon-people me-2"></i>
                <span class="menu-title fs-6">Users</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link logoutBtn" href="#">
                <i class="icon-logout me-2"></i>
                <span class="menu-title fs-6">Logout</span>
            </a>
        </li>
    </ul>
</nav>
