<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//routes yang mengatur / jalur, artinya ci akan membuat jalur ketika ada akses yg metode reqnya get (ketika mengetikkan sesuatu di url)
//alamatnya / artinya base urlnya (8080) maka akan tampil controller home, method index
//Home -> controller
//Index -> method
$routes->get('/', 'Home::index');
$routes->get('/pages', 'Pages::home');

//Mahasiswa
$routes->get('/pages/mahasiswa', 'Mahasiswa\HomeController::index');
$routes->post('/pages/mahasiswa/masukkanNama', 'Mahasiswa\HomeController::masukkanNama');
$routes->get('/pages/mahasiswa/keluar', 'Mahasiswa\HomeController::keluar');
$routes->get('/pages/mahasiswa/tesKepribadian', 'Mahasiswa\TesKepribadianController::index', ['filter' => 'mahasiswa']);
$routes->get('/pages/mahasiswa/tesKepribadian/siap', 'Mahasiswa\TesKepribadianController::siap', ['filter' => 'mahasiswa']);
$routes->post('/pages/mahasiswa/tesKepribadian/nextSoal', 'Mahasiswa\TesKepribadianController::nextSoal', ['filter' => 'mahasiswa']);
$routes->get('/pages/mahasiswa/tesKepribadian/hasilTes', 'Mahasiswa\TesKepribadianController::hasilTes', ['filter' => 'mahasiswa']);
$routes->get('/pages/mahasiswa/tesTulis', 'Mahasiswa\TesTulisController::index', ['filter' => 'mahasiswa']);
$routes->get('/pages/mahasiswa/tesTulis/siap', 'Mahasiswa\TesTulisController::siap', ['filter' => 'mahasiswa']);
$routes->post('/pages/mahasiswa/tesTulis/kirimJawaban', 'Mahasiswa\TesTulisController::kirimJawaban', ['filter' => 'mahasiswa']);
$routes->get('/pages/mahasiswa/riwayatTes', 'Mahasiswa\RiwayatTesController::index', ['filter' => 'mahasiswa']);
$routes->get('/pages/mahasiswa/riwayatTes/download/(:any)', 'Mahasiswa\RiwayatTesController::download/$1', ['filter' => 'mahasiswa']);

//Konselor
$routes->get('/pages/konselor', 'Konselor\HomeController::index');
$routes->get('/pages/konselor/kelolaTes', 'Konselor\KelolaTesController::index');
$routes->get('/pages/konselor/aturTes', 'Konselor\AturTesController::index');
$routes->post('/pages/konselor/aturTesSimpan', 'Konselor\AturTesController::simpan');
$routes->get('/pages/konselor/dataTes', 'Konselor\DataTesController::index');
$routes->post('/pages/konselor/soalkepribadianSimpan', 'Konselor\KelolaTesController::soalkepribadianSimpan');
$routes->get('/pages/konselor/soalkepribadianEdit/(:any)', 'Konselor\KelolaTesController::soalkepribadianEdit/$1');
$routes->post('/pages/konselor/soalkepribadianUpdate', 'Konselor\KelolaTesController::soalkepribadianUpdate');
$routes->get('/pages/konselor/soalkepribadianHapus/(:any)', 'Konselor\KelolaTesController::soalkepribadianHapus/$1');
$routes->post('/pages/konselor/soaltulisSimpan', 'Konselor\KelolaTesController::soaltulisSimpan');
$routes->get('/pages/konselor/soaltulisEdit/(:any)', 'Konselor\KelolaTesController::soaltulisEdit/$1');
$routes->post('/pages/konselor/soaltulisUpdate', 'Konselor\KelolaTesController::soaltulisUpdate');
$routes->get('/pages/konselor/soaltulisHapus/(:any)', 'Konselor\KelolaTesController::soaltulisHapus/$1');

$routes->setAutoRoute(true);


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
