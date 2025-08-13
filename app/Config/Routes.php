<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
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
$routes->get('/', 'Auth::index');

// $routes->get('/kode/create', 'Kode::create');
// $routes->get('/suratmasuk/create', 'Suratmasuk::create');
// $routes->get('/suratkeluar/create', 'Suratkeluar::create');
// $routes->get('/kode/edit/(:any)', 'Kode::edit/$1');
// $routes->get('/suratmasuk/edit/(:any)', 'Suratmasuk::edit/$1');
// $routes->get('/suratkeluar/edit/(:any)', 'Suratkeluar::edit/$1');
// $routes->delete('/admin/suratmasuk(:any)', 'Admin::deletesuratmasuk/$1');
// $routes->delete('/admin/deletekode/(:num)', 'Admin::deletekode/$1');
// $routes->get('/auth', 'auth::index', ['filter' => 'usersAuthLogin']);

// $routes->group('dashboard', ['filter' => 'usersAuth'], function ($routes) {
// 	$routes->get('/dashboard/index', 'Dashboard::index');
// });


//routes Dashboard
$routes->get('/dashboard/*', 'Dashboard::index', ['filter' => 'usersAuth']);
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'usersAuth']);
$routes->get('/dashboard/index', 'Dashboard::index', ['filter' => 'usersAuth']);

//routes Profil
$routes->get('/profil/*', 'Profil::index', ['filter' => 'usersAuth']);
$routes->get('/profil', 'Profil::index', ['filter' => 'usersAuth']);
$routes->get('/profil/index', 'Profil::index', ['filter' => 'usersAuth']);
$routes->get('/profil/edit', 'Profil::edit', ['filter' => 'usersAuth']);

//routes Lupapassword
$routes->get('/ubahpassword/*', 'Ubahpassword::index', ['filter' => 'usersAuth']);
$routes->get('/ubahpassword', 'Ubahpassword::index', ['filter' => 'usersAuth']);
$routes->get('/ubahpassword/index', 'Ubahpassword::index', ['filter' => 'usersAuth']);

//routes Kode
$routes->get('/kode/*', 'Kode::index', ['filter' => 'usersAuth']);
$routes->get('/kode', 'Kode::index', ['filter' => 'usersAuth']);
$routes->get('/kode/index', 'Kode::index', ['filter' => 'usersAuth']);
$routes->get('/kode/create', 'Kode::create', ['filter' => 'usersAuth']);
$routes->get('/kode/edit/(:any)', 'Kode::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/kode/delete/(:any)', 'Kode::delete/$1', ['filter' => 'usersAuth']);

//routes Surat masuk
$routes->get('/suratmasuk/*', 'Suratmasuk::index', ['filter' => 'usersAuth']);
$routes->get('/suratmasuk', 'Suratmasuk::index', ['filter' => 'usersAuth']);
$routes->get('/suratmasuk/index', 'Suratmasuk::index', ['filter' => 'usersAuth']);
$routes->get('/suratmasuk/create', 'Suratmasuk::create', ['filter' => 'usersAuth']);
$routes->get('/suratmasuk/edit/(:any)', 'Suratmasuk::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/suratmasuk/detail/(:any)', 'Suratmasuk::detail/$1', ['filter' => 'usersAuth']);
// $routes->get('/suratmasuk/delete/(:any)', 'Suratmasuk::delete/$1', ['filter' => 'usersAuth']);
$routes->get('/suratmasuk/(:any)', 'Suratmasuk::detail/$1', ['filter' => 'usersAuth']);

//routes Surat Keluar
$routes->get('/suratkeluar/*', 'Suratkeluar::index', ['filter' => 'usersAuth']);
$routes->get('/suratkeluar', 'Suratkeluar::index', ['filter' => 'usersAuth']);
$routes->get('/suratkeluar/index', 'Suratkeluar::index', ['filter' => 'usersAuth']);
$routes->get('/suratkeluar/create', 'Suratkeluar::create', ['filter' => 'usersAuth']);
$routes->get('/suratkeluar/edit/(:any)', 'Suratkeluar::edit/$1', ['filter' => 'usersAuth']);
$routes->get('/suratkeluar/detail/(:any)', 'Suratkeluar::detail/$1', ['filter' => 'usersAuth']);
// $routes->get('/suratkeluar/delete/(:any)', 'Suratkeluar::delete/$1', ['filter' => 'usersAuth']);
$routes->get('/suratkeluar/(:any)', 'Suratkeluar::detail/$1', ['filter' => 'usersAuth']);

//routes Laporan suratmasuk
$routes->get('/laporanmasuk/*', 'Laporanmasuk::index', ['filter' => 'usersAuth']);
$routes->get('/laporanmasuk', 'Laporanmasuk::index', ['filter' => 'usersAuth']);
$routes->get('/laporanmasuk/index', 'Laporanmasuk::index', ['filter' => 'usersAuth']);

//routes Laporan suratkeluar
$routes->get('/laporankeluar/*', 'Laporankeluar::index', ['filter' => 'usersAuth']);
$routes->get('/laporankeluar', 'Laporankeluar::index', ['filter' => 'usersAuth']);
$routes->get('/laporankeluar/index', 'Laporankeluar::index', ['filter' => 'usersAuth']);




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
