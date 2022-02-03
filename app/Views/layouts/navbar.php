<nav class="navbar default-layout col-lg-12 col-12 p-0 d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo fs-4 text-center" href="<?= base_url() ?>">
                <span class="text-dark">Bedah</span><span class="fw-bold text-warning">Rumah</span>
            </a>
        </div>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <?php if ($title === 'Dashboard'): ?>
                <?php
                $quotes = [
					'Kejahatan akan menang bila orang yang benar tidak melakukan apa-apa. -Jenderal Sudirman',
					'Pikiran kita ibarat parasut, hanya berfungsi ketika terbuka. - Walt Disney',
					'Orang yang tak pernah membuat kesalahan, maka tak akan pernah mencoba sesuatu yang baru. - Albert Einstein',
					'Bersabarlah, karena kesabaran adalah sebuah pilar keimanan. - Umar bin Khattab',
                ];
                ?>
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text">Welcome, <span
                                class="text-black fw-bold"><?= session()->user['nama_lengkap'] ?></span></h1>
                    <h3 class="welcome-sub-text"><?php echo $quotes[random_int(0, 2)] ?></h3>
                </li>
            <?php else: ?>
                <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                    <h1 class="welcome-text"><?= $title ?></h1>
                </li>
            <?php endif; ?>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown">
                    <img class="img-xs rounded-circle" src="<?= base_url('public/images/profile.png') ?>"
                         alt="Profile image"> </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="<?= base_url('public/images/profile.png') ?>"
                             alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold"><?= session()->user['nama_lengkap'] ?></p>
                        <p class="fw-light text-muted mb-0"><?= session()->user['email'] ?></p>
                    </div>
                    <a href="#" class="dropdown-item logoutBtn">
                        <i class="dropdown-item-icon icon-power me-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-bs-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>
    </div>
</nav>
<!-- partial -->