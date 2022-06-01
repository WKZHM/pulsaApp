<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

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
$routes->setDefaultController('Home');
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
// $routes->group('', ['filter' => 'login'], function ($routes) {
$routes->get('/', 'Home::index');
$routes->get('/member', 'Member::index');
$routes->get('/member/create', 'Member::create');
$routes->get('/jenis', 'Jenis::index');

$routes->get('/pulsa', 'Pulsa::index');
$routes->get('/pulsa/create', 'Pulsa::create');

$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/transaksi', 'penjualan::transaksi');

$routes->get('/laporan', 'Laporan::index');


// routes delete & edit.
$routes->delete('/member/(:num)', 'Member::delete/$1');
$routes->get('/member/edit/(:segment)', 'Member::edit/$1');
$routes->delete('/pulsa/(:num)', 'Pulsa::delete/$1');
$routes->get('/pulsa/edit/(:segment)', 'Pulsa::edit/$1');
$routes->delete('/penjualan/(:num)', 'Penjualan::delete/$1');
// });
//$routes->get('/', 'Nama::index');
// $routes->get('/perkenalan', 'Nama::perkenalan');
// $routes->get('/detail', 'Nama::detail');

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
