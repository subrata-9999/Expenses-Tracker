<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('register', 'AuthController::goto_register');
$routes->post('register', 'AuthController::register');
$routes->get('login', 'AuthController::goto_login');
$routes->post('login', 'AuthController::login');
$routes->get('dashboard', 'DashboardController::index');
$routes->post('dashboard', 'DashboardController::filter');
$routes->get('change-password', 'AuthController::goto_changePassword');
$routes->post('change-password', 'AuthController::changePassword');
$routes->get('/add-expenses', 'ExpensesController::goto_addExpenses');
$routes->post('/addExpenses', 'ExpensesController::addExpenses');



$routes->post('logout', 'AuthController::logout');