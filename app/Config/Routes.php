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
$routes->get('/skills', 'SkillController::index');
$routes->get('/list_categories', 'CatController::index');
$routes->get('/brand', 'BrandController::index');
$routes->get('/products', 'Productcontroller::index');

// $routes->get('/skills/(:num)/edit', 'SkillController::edit/$1');
$routes->match(['get', 'post'], '/skills/(:num)/edit', 'SkillController::edit/$1');
// USER ROUTES 
$routes->group('users', function ($routes) {
    $routes->get('/', 'UserController::index');
    $routes->get('search', 'UserController::search');
    $routes->match(['get', 'post'], 'create', 'UserController::create');
    $routes->match(['get', 'post'], '(:num)/edit', 'UserController::edit/$1');
    $routes->get('(:num)/delete', 'UserController::delete/$1');
});
// SKILL ROUTES
$routes->group('skills', function ($routes) {
    $routes->match(['get', 'post'], 'create', 'SkillController::create');
    $routes->match(['get', 'post'], '(:num)/edit', 'SkillController::edit/$1');
    $routes->get('(:num)/delete', 'SkillController::delete/$1');
});

//CATEGORIES ROUTES
$routes->group('list_categories', function ($routes) {
    $routes->get('search', 'CatController::search');
    $routes->match(['get', 'post'], 'create', 'CatController::create');
    $routes->match(['get', 'post'], '(:num)/edit', 'CatController::edit/$1');
    $routes->get('(:num)/delete', 'CatController::delete/$1');
});

//BRAND ROUTES
$routes->group('brand', function ($routes) {
    $routes->get('search', 'BrandController::search');
    $routes->match(['get', 'post'], 'create', 'BrandController::create');
    $routes->match(['get', 'post'], '(:num)/edit', 'BrandController::edit/$1');
    $routes->get('(:num)/delete', 'BrandController::delete/$1');
});

// PRODUCTS ROUTES 
$routes->group('products', function ($routes) {
    $routes->get('/', 'Productcontroller::index');
    $routes->get('search', 'Productcontroller::search');
    $routes->match(['get', 'post'], 'create', 'Productcontroller::create');
    $routes->match(['get', 'post'], '(:num)/edit', 'Productcontroller::edit/$1');
    $routes->get('(:num)/delete', 'Productcontroller::delete/$1');
});



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
