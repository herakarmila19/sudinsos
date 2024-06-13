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
$routes->get('pelayanan', 'Frontend\BerandaController::pelayanan');

// Berita Selatan
$routes->group('berita', function ($routes) {
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

// Halaman API =============================================================================
$routes->post('api/berita', 'Backend\ApiController::data_berita');

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
