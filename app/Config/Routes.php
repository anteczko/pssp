<?php

namespace Config;

// Create a new instance of our RouteCollection class.
use App\Controllers\BookController;
use App\Controllers\BindingController;
use App\Controllers\UserController;

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
$routes->setAutoRoute(true);



/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
#$routes->get('/', 'BindingController::binding');
$routes->get('/','BookController::showBooks');

$routes->get('/users','UserController::index');
$routes->match(['get','post'],'/users/loginAction','UserController::loginAction');
$routes->match(['get','post'],'/users/registerAction','UserController::registerAction');
$routes->get('/users/login','UserController::login');
$routes->get('/users/register','UserController::register');
$routes->get('/users/logout','UserController::logout');
#$routes->get('/users/(:segment)','UserController::$1');

$routes->get('/pages','PageController::index');
$routes->get('/pages/all','PageController::allPages');
$routes->get('/pages/add','PageController::add');
$routes->match(['get','post'],'/pages/addAction','PageController::addAction');

$routes->get('/books/showBooks','BookController::showBooks');
$routes->get('/books/binding','BindingController::binding');
$routes->get('/books/pageRightAction','BindingController::pageRightAction');
$routes->get('/books/pageLeftAction','BindingController::pageLeftAction');
$routes->get('/books/addSelectedPageAction/(:segment)','BindingController::addSelectedPageAction/$1');
#$routes->get('/books/addSelectedPageActionAt/(:num)/(:num)','BindingController::addSelectedPageAction/$1/$2');
$routes->get('/books/bindingRightAction','BindingController::bindingRightAction');
$routes->get('/books/bindingLeftAction','BindingController::bindingLeftAction');
$routes->get('/books/bindingReset','BindingController::resetBinding');
#$routes->get('/books/bindingSave','BindingController::saveBinding');
$routes->post('/books/bindingSave','BindingController::saveBinding');

$routes->get('/books/show/(:num)','BookController::showBook/$1');

$routes->get('/test','PageController::test');

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
