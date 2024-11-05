<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Home::index');
$routes->get('/Dashboard', 'Home::index');


$routes->get('/register', 'Register::redirectRegister');
$routes->get('/login', 'Login::redirectLogin');
$routes->get('/Logout','Logout::Logout');

$routes->match(['get', 'post'], '/register/store', 'Register::register');
$routes->match(['get', 'post'], '/login/loginAuth', 'Login::loginAuth');

//Category
$routes->get('/Category','Category::goCategory');
$routes->post('/admin/create_category','Category::add_Cat');
$routes->get('/admin/delete_category/(:num)','Category::delete_Cat/$1');
$routes->get('/admin/edit_category/(:num)','Category::edit_Cat/$1');
$routes->post('/admin/update_category/(:num)','Category::update_Cat/$1');
$routes->get('/admin/status_active/(:num)','Category::status_active/$1');
$routes->get('/admin/status_deactive/(:num)','Category::status_deactive/$1');

//Vehicle
$routes->get('/Add_vehicle','Vehicle::goAddvehicle');
$routes->get('/Manage_vehicle','Vehicle::goManagevehicle');
$routes->post('/admin/add_vehicle','Vehicle::addVehicle');
$routes->get('/admin/unparked/(:num)','Vehicle::unparked/$1');
$routes->get('/admin/parked/(:num)','Vehicle::parked/$1');
$routes->get('/admin/receipt/(:num)','Vehicle::receipt/$1');

//Utils
$routes->get('/Setting','Utils::goSetting');
$routes->match(['get','post'],'/admin/setting','Utils::editPassword');

// Route pour afficher les véhicules avec pagination
$routes->get('/Search_vehicle','Search::filterSearch');
$routes->get('/admin/delete_vehicle/(:num)','Search::deleteVehicle/$1');

$routes->get('/Reports','Reports::goReports');

