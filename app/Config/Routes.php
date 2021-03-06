<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Forum::index');
$routes->add('daftar', 'Forum::daftarView');
$routes->add('masuk', 'Forum::masukView');
$routes->get('/jobs', 'Forum::jobs');
$routes->get('/products', 'Forum::prodct');
$routes->add('posting', 'Forum::postingView');
$routes->add('diskusi/(:any)', 'Forum::diskusiView');
$routes->add('member', 'Forum::memberView');
$routes->add('member/profile', 'Forum::memProfView');
$routes->add('member/password', 'Forum::memPassView');
$routes->add('member/keluar', 'Forum::keluar');
$routes->add('list_member', 'Forum::listMemView');
$routes->add('contact', 'Forum::contactView');
$routes->add('detail', 'Forum::detmember');

$routes->add('admin', 'Admin::adminView');
$routes->add('admin/posting', 'Admin::postingView');
$routes->add('admin/posting/buat', 'Admin::postingNew');
$routes->add('admin/posting/edit/(:num)', 'Admin::postingEdit');
$routes->add('admin/posting/hapus/(:num)', 'Admin::postingDelete');


/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
