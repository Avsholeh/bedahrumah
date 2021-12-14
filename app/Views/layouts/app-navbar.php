<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
        </div>
        <div>
            <a class="navbar-brand brand-logo fs-4 text-center" href="#">
                <span class="text-dark">Bedah</span><span class="fw-bold text-warning">Rumah</span>
            </a>
        </div>
    </div>
    <?php
    $quotes = [
        'The secret of getting ahead is getting started. - Mark Twain',
        'Do what you feel in your heart to be right. - Eleanor Roosevelt',
        'Whatever you are, be a good one. - Abraham Lincoln',
        'One day or day one. You decide. – Unknown',
        'Focus on being productive instead of busy. – Tim Ferriss',
        'It’s never too late to be what you might’ve been. – George Eliot',
    ];
    ?>
    <div class="navbar-menu-wrapper d-flex align-items-top">
        <ul class="navbar-nav">
            <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                <h1 class="welcome-text">Welcome, <span class="text-black fw-bold"><?= session()->user['nama_lengkap'] ?></span></h1>
                <h3 class="welcome-sub-text"><?php echo $quotes[random_int(0, 5)] ?></h3>
            </li>
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
<!--                    <a class="dropdown-item"><i class="dropdown-item-icon icon-user me-2"></i>-->
<!--                        My Profile-->
<!--                    </a>-->
                    <a href="<?= base_url('logout') ?>" class="dropdown-item"><i
                                class="dropdown-item-icon icon-power me-2"></i>
                        Logout
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