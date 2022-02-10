<?php

namespace Config;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'Auth\Login::index');
$routes->get('logout', 'Auth\Dashboard::logout');
$routes->add('reset_password/(:any)', 'Auth\Login::reset_password/$1');
$routes->post('set_password', 'Auth\Login::change_pwd');
$routes->add('forget-password', 'Auth\Login::forgotPassword');
$routes->add('dashboard', 'Auth\Login::check');
// Group of routes with filter
$routes->group('', ['filter' => 'isLoggedIn'], function ($routes) {
	$routes->add('products', 'Auth\Dashboard::getProducts');
	$routes->add('add-product', 'Auth\Dashboard::addProducts');
	$routes->add('deleteProduct/(:any)', 'Auth\Dashboard::delete_prd/$1');
	$routes->add('edit-product', 'Auth\Dashboard::editProduct');
	$routes->add('addBatch', 'Auth\Dashboard::batchEntry');
	$routes->add('edit_product_details', 'Auth\Dashboard::editProductFields');
	//customer
	$routes->add('registry', 'Auth\Dashboard::getRawData');
	$routes->add('edit-customer', 'Auth\Dashboard::editCustomer');
	$routes->add('edit-registry', 'Auth\Dashboard::editRegistryCustomer');
	$routes->add('view-customer', 'Auth\Dashboard::viewRegistryCustomer');
	$routes->add('assign', 'Auth\Dashboard::assignCustomerData');
	//existing customer
	$routes->add('customer', 'CustomerController::getCustomers');
	//search existing customers
	$routes->add('search-customer', 'CustomerController::searchByKeyword');
	//add existing customer through form
	$routes->add('add-customer', 'CustomerController::addCustomer');
	//order
	$routes->add('order/(:num)', 'CustomerController::addOrder/$1');
	$routes->add('edit-order/(:num)','OrdersController::updateOrder/$1');
	$routes->add('productView','OrdersController::orderDetailView');
	$routes->add('order-details','OrdersController::index');
	$routes->add('add-orders/(:num)','OrdersController::addOrders/$1');
	$routes->add('listproducts','OrdersController::getProduct');
	$routes->add('listprdCode','OrdersController::getPrdCode');
	$routes->add('GetValue','OrdersController::GetPrddetails');
	$routes->add('process_order','OrdersController::processOrder');
	
	//settings
	$routes->add('settings', 'SettingController::choose_setting');
	//get assign form data
	$routes->add('assign_agents', 'CustomerReportsController::AssignAgents');
	//reports
	$routes->get('reports', 'CustomerReportsController::index');
	$routes->add('report-filters', 'CustomerReportsController::filterReportData');
	$routes->add('search_matchCust', 'CustomerController::matchingCust');
	$routes->post('search_customer', 'CustomerReportsController::filterOptReports');
	//user role management
	$routes->add('user', 'Auth\Dashboard::user');
	$routes->add('add-user', 'Auth\Dashboard::addUser');
	$routes->add('ajax-call', 'Auth\Dashboard::getPosition');
	$routes->post('edit-user', 'Auth\Dashboard::EditUser');
	$routes->add('delete/(:any)', 'Auth\Dashboard::RemoveUser/$1');
});

/**
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
