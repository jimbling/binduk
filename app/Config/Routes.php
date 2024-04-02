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
$routes->get('/', 'Masuk::index');
$routes->get('/siswa', 'Siswa::index');
$routes->get('/riwayat-siswa', 'Siswa::index');
$routes->get('/siswa/mutasi', 'Siswa::riwayatSiswa');
$routes->get('/siswa/export', 'Siswa::export');
$routes->post('/siswa/hapusriwayat/(:num)', 'Siswa::hapusRiwayat/$1');
$routes->get('/siswa/batalkanmutasi/(:num)', 'Siswa::batalMutasi/$1');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/setting-sp', 'Siswa::settingsp');
$routes->get('/setting-gtk', 'Siswa::settinggtk');
$routes->get('/setting-rombel', 'Siswa::settingrombel');
$routes->post('/setting-rombel', 'Siswa::settingrombel');
$routes->post('/gtk/simpan', 'Gtk::simpan');
$routes->get('/gtk/hapus/(:num)', 'Gtk::hapus/$1');
$routes->get('/siswa/cetaksiswa/(:any)', 'Siswa::cetaksiswa/$1');
$routes->get('/siswa/tambahsiswa', 'Siswa::tambahsiswa');
$routes->get('/siswa/setting-akun', 'Akun::index');
$routes->post('/siswa/setting-akun/update', 'Akun::update');
$routes->post('/siswa/rombel', 'Siswa::showSiswaByRombel');
$routes->get('/leger-input', 'Leger::formLeger');
$routes->get('/leger-cetak', 'Leger::cetakLeger');
$routes->get('/leger-atur', 'Leger::settingLeger');
$routes->post('/leger-atur/hapus/(:num)', 'Leger::hapus/$1');
$routes->post('/leger-atur/simpan', 'Leger::simpan');
$routes->add('input-nilai', 'Leger::inputNilai');
$routes->post('simpan-nilai', 'Leger::simpanNilai');
$routes->post('/lihat-nilai', 'Leger::lihatNilai');
$routes->get('/leger/getsiswa/(:num)', 'Leger::getSiswa/$1', ['filter' => 'auth']);
$routes->post('nilai/update-siswa/(:num)', 'Leger::updateSiswa/$1', ['filter' => 'auth']);
$routes->post('upload/kopsurat', 'Siswa::kopsurat');
$routes->post('/print-leger', 'Leger::printNilai');
$routes->post('lulus/luluspd', 'Lulus::luluspd');
$routes->post('naik/naikkelas', 'Naik::naikkelas');
$routes->get('siswa/getsiswabykelas/(:num)', 'Siswa::getSiswaByKelas/$1');
$routes->post('datacetak/update', 'DataCetakController::updateData');
$routes->get('siswa/(:any)', 'Siswa::detailsiswa/$1');
$routes->get('editsiswa/(:any)', 'Siswa::editsiswa/$1');
$routes->post('siswa/simpanmutasi', 'Siswa::simpanMutasi');
$routes->post('siswa/hapus/(:num)', 'Siswa::hapus/$1');
$routes->post('siswa/simpan', 'Siswa::simpan');
$routes->post('siswa/update', 'Siswa::update');
$routes->post('masuk/auth', 'Masuk::auth');
$routes->get('masuk/keluar', 'Masuk::keluar');
$routes->post('/siswa/importData', 'Siswa::importData');
$routes->post('/siswa/tahun', 'Siswa::getDataByYear');
$routes->get('unduh/(:segment)', 'Siswa::unduh/$1');
$routes->get('siswa/tahun/(:num)', 'Siswa::index/$1');
$routes->get('/siswa/tambahsiswa', 'Siswa::tambahsiswa', ['filter' => 'auth']);

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
