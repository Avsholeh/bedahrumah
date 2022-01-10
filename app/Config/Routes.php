<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('HomeController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// Grup URL yg hanya bisa diakses oleh pengguna yang belum login
$routes->group('/', ['filter' => 'guest'], function ($routes) {

    // === Home & Otentikasi
    $routes->get('', 'HomeController::index');
    $routes->get('login', 'HomeController::login');
    $routes->post('proses_login', 'HomeController::prosesLogin');
    $routes->get('daftar', 'HomeController::daftar');
    $routes->post('proses_daftar', 'HomeController::prosesDaftar');

});

// Grup URL yg hanya bisa diakses oleh pengguna yang sudah login
$routes->group('/', ['filter' => 'auth'], function ($routes) {

    // === Logout
    $routes->get('logout', 'HomeController::logout');

    // === Dashboard
    $routes->get('dashboard', 'DashboardController::index');

    // === Permohonan
    $routes->get('permohonan', 'PermohonanController::index');
    $routes->get('permohonan/edit/(:num)', 'PermohonanController::edit/$1');
    $routes->post('permohonan/update', 'PermohonanController::update');
    $routes->post('permohonan/simpan', 'PermohonanController::simpan');

    // === Verifikasi
    $routes->get('verifikasi', 'VerifikasiController::index');
    $routes->post('verifikasi/proses', 'VerifikasiController::verifikasi');
    $routes->get('naivebayes', 'VerifikasiController::naivebayes');

    // === Data Pengaju
    $routes->get('pengaju', 'PengajuController::index');
    $routes->get('pengaju/tambah', 'PengajuController::tambah');
    $routes->post('pengaju/simpan', 'PengajuController::simpan');

    // === Data Rumah
    $routes->get('rumah', 'RumahController::index');
    $routes->get('rumah/tambah', 'RumahController::tambah');
    $routes->post('rumah/simpan', 'RumahController::simpan');

});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
