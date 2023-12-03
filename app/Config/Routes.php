<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH
$routes->group('', ['filter' => 'guest'], function ($routes) {
    // Register
    $routes->match(['get', 'post'], 'register', 'AuthController::register');
    // Login
    $routes->match(['get', 'post'], 'login', 'AuthController::login');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->post('logout', 'AuthController::logout');

    $routes->get('/', 'DashboardController::index');
    $routes->match(['get', 'post'], '/top-up', 'TopUpController::index');
    $routes->match(['get', 'post'], '/service/(:segment)', 'ServiceController::index');
    $routes->get('/transaction', 'TransactionController::index');
    $routes->get('/transaction/get-history', 'TransactionController::getTransactionHistory');

    $routes->get('/profile', 'ProfileController::index');
    $routes->match(['get', 'put'], '/profile/edit', 'ProfileController::edit');
    $routes->post('/edit-image-profile', 'ProfileController::editImageProfile');
});
