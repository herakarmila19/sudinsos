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
$routes->setDefaultController('MenuController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Frontend =============================================================================

// Beranda
$routes->get('/', 'Frontend\BerandaController::index');
$routes->get('profil', 'Frontend\BerandaController::profil');

// Menu
$routes->get('menu/(:any)', 'Frontend\BerandaController::menu/$1');

// Files
$routes->get('files/(:any)', 'Frontend\BerandaController::files/$1');

// Pemerintahan
$routes->group('pemerintahan', function ($routes) {
    $routes->get('perangkat-kelurahan', 'Frontend\PemerintahanController::perangkat_kelurahan');
    $routes->get('layanan', 'Frontend\PemerintahanController::layanan');
    $routes->get('pejabat/(:any)', 'Frontend\PemerintahanController::pejabat/$1');
    $routes->get('wilayah/(:any)', 'Frontend\PemerintahanController::wilayah/$1');
    $routes->get('bank-data', 'Frontend\PemerintahanController::bank_data');
    $routes->get('agenda', 'Frontend\PemerintahanController::agenda');
    $routes->get('regulasi', 'Frontend\PemerintahanController::regulasi');
    $routes->get('regulasi/(:any)', 'Frontend\PemerintahanController::regulasi_unduh/$1');
});

// Berita Selatan
$routes->group('berita-selatan', function ($routes) {
    $routes->get('', 'Frontend\BeritaController::index');
    $routes->get('detail/(:any)', 'Frontend\BeritaController::show/$1');
    $routes->get('pencarian', 'Frontend\BeritaController::pencarian');
    $routes->get('kategori/(:any)', 'Frontend\BeritaController::index/$1');

    // Galeri
    $routes->group('galeri', function ($routes) {
        $routes->group('foto', function ($routes) {
            $routes->get('', 'Frontend\BeritaController::foto');
            $routes->get('(:any)', 'Frontend\BeritaController::foto_show/$1');
        });

        $routes->group('video', function ($routes) {
            $routes->get('', 'Frontend\BeritaController::video');
            $routes->get('(:any)', 'Frontend\BeritaController::video_show/$1');
        });
    });
});

// PPID Kelurahan
$routes->get('/ppid-kelurahan', 'Frontend\PpidKelurahanController::index');

// PPID Jak-Sel
// $routes->group('ppid', function ($routes) {
//     $routes->get('profil', 'Frontend\PpidController::profil');
//     $routes->get('alur-mekanisme', 'Frontend\PpidController::alur_mekanisme');
// });

// Informasi Publik
// $routes->get('informasi-publik', 'Frontend\InformasiPublikController::index');

// Backend =============================================================================
$routes->get('auth/login', 'Backend\Manajemen\UserController::login');
$routes->add('auth', 'Backend\Manajemen\UserController::auth');

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // Dashboard
    $routes->get('dashboard', 'Backend\DashboardController::dashboard');
    $routes->resource('slide', ['controller' => 'Backend\SlideController']);
    $routes->resource('visi-misi', ['controller' => 'Backend\VisiMisiController']);

    // Manajemen ==========
    $routes->resource('user', ['controller' => 'Backend\Manajemen\UserController']);
    $routes->get('logout', 'Backend\Manajemen\UserController::logout');
    $routes->resource('menu', ['controller' => 'Backend\Manajemen\MenuController']);

    // Pemerintahan ==========
    $routes->resource('pejabat', ['controller' => 'Backend\Pemerintahan\PejabatController']);
    $routes->resource('prestasi-kerja', ['controller' => 'Backend\Pemerintahan\PrestasiKerjaController']);
    $routes->resource('bank-data', ['controller' => 'Backend\Pemerintahan\BankDataController']);

    // Humas ==========
    $routes->resource('banner', ['controller' => 'Backend\Humas\BannerController']);
    $routes->resource('berita', ['controller' => 'Backend\Humas\BeritaController']);
    $routes->resource('agenda', ['controller' => 'Backend\Humas\AgendaController']);

    // Media ==========
    $routes->resource('file', ['controller' => 'Backend\Media\FileController']);
    $routes->resource('album', ['controller' => 'Backend\Media\AlbumController']);
    $routes->resource('video', ['controller' => 'Backend\Media\VideoController']);
    $routes->resource('regulasi', ['controller' => 'Backend\Media\RegulasiController']);
});

// Hak Akses Kecamatan
$routes->group('kecamatan', ['filter' => 'authKecamatan'], function ($routes) {
    $routes->get('', 'Backend\KecamatanController::index');
    $routes->get('(:any)/edit', 'Backend\KecamatanController::edit/$1');
    $routes->patch('(:any)', 'Backend\KecamatanController::update/$1');
    $routes->get('logout', 'Backend\KecamatanController::logout');
});

// Halaman API =============================================================================
$routes->post('api/berita', 'Backend\ApiController::data_berita');

// Menu Custom
$routes->get('kominfotik-rekrutmen', 'Frontend\BerandaController::menu_custom');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
