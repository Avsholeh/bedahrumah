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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */
// Kelompok URL yg hanya bisa diakses oleh pengguna yang belum login
$routes->group('/', ['filter' => 'guest'], function ($routes) {

    // === Home & Otentikasi
    $routes->get('', 'Home::index');
    $routes->get('login', 'Home::login');
    $routes->post('proses_login', 'Home::prosesLogin');
    $routes->get('daftar', 'Home::daftar');
    $routes->post('proses_daftar', 'Home::prosesDaftar');

});

// Kelompok URL yg hanya bisa diakses oleh pengguna yang sudah login
$routes->group('/', ['filter' => 'authenticated'], function ($routes) {

    // === Logout
    $routes->get('logout', 'Home::logout');

    // === Dashboard
    $routes->get('dashboard', 'Dashboard::index');

    // === Data Pengaju
    $routes->get('pengaju/lihat', 'Pengaju::lihat');
    $routes->get('pengaju/tambah', 'Pengaju::tambah');
    $routes->post('pengaju/simpan', 'Pengaju::simpan');

    // === Data Rumah
    $routes->get('rumah/lihat', 'Rumah::lihat');
    $routes->get('rumah/tambah', 'Rumah::tambah');
    $routes->post('rumah/simpan', 'Rumah::simpan');

    // === Seleksi
    $routes->get('seleksi/lihat', 'Seleksi::lihat');
    $routes->get('pengaju/tambah', 'Pengaju::tambah');
    $routes->post('pengaju/simpan', 'Pengaju::simpan');

});

if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
