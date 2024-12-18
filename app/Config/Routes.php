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
    $routes->post('permohonan', 'PermohonanController::index');
    $routes->get('permohonan/tambah', 'PermohonanController::tambah');
    $routes->get('permohonan/edit/(:num)', 'PermohonanController::edit/$1');
    $routes->post('permohonan/update', 'PermohonanController::update');
    $routes->post('permohonan/simpan', 'PermohonanController::simpan');
    $routes->get('permohonan/hapus/(:num)', 'PermohonanController::hapus/$1');
    $routes->get('permohonan/gambar/(:num)', 'PermohonanController::gambar/$1');
    $routes->get('permohonan/skor/(:num)', 'PermohonanController::skor/$1');
    $routes->get('permohonan/pelapor/(:num)', 'PermohonanController::pelapor/$1');

    // === Verifikasi
    $routes->get('verifikasi', 'VerifikasiController::index');
    $routes->post('verifikasi/proses', 'VerifikasiController::verifikasi');

    // === Skoring
    $routes->get('skoring', 'SkoringController::index');

    $routes->post('skoring/indikator', 'SkoringController::indikator');
    $routes->get('skoring/indikator/edit/(:num)', 'SkoringController::indikatorEdit/$1');
    $routes->post('skoring/indikator/update', 'SkoringController::indikatorUpdate');
    $routes->get('skoring/indikator/hapus/(:num)', 'SkoringController::indikatorHapus/$1');

    $routes->post('skoring/atribut', 'SkoringController::atribut');
    $routes->get('skoring/atribut/edit/(:num)', 'SkoringController::atributEdit/$1');
    $routes->post('skoring/atribut/update', 'SkoringController::atributUpdate');
    $routes->get('skoring/atribut/hapus/(:num)', 'SkoringController::atributHapus/$1');

    // === Users
    $routes->get('users', 'UserController::index');
    $routes->get('users/tambah', 'UserController::tambah');
    $routes->get('users/edit/(:num)', 'UserController::edit/$1');
    $routes->post('users/simpan', 'UserController::simpan');
    $routes->post('users/update', 'UserController::update');
    $routes->get('users/hapus/(:num)', 'UserController::hapus/$1');

    // === Users
    $routes->get('laporan', 'LaporanController::index');
    $routes->get('laporan/proses', 'LaporanController::proses');
    $routes->get('laporan/cetak', 'LaporanController::cetak');

});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
