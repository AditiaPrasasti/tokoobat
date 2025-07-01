<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Dashboard
$routes->get('/', 'DashboardController::index');
$routes->get('dashboard', 'DashboardController::index');

// Penerbit Routes
$routes->group('penerbit', function($routes) {
    $routes->get('/', 'PenerbitController::index');
    $routes->get('create', 'PenerbitController::create');
    $routes->post('store', 'PenerbitController::store');
    $routes->get('edit/(:num)', 'PenerbitController::edit/$1');
    $routes->post('update/(:num)', 'PenerbitController::update/$1');
    $routes->get('delete/(:num)', 'PenerbitController::delete/$1');
});

// Buku Routes
$routes->get('/buku', 'BukuController::index');
$routes->get('/buku/create', 'BukuController::create');
$routes->post('/buku/store', 'BukuController::store');
$routes->get('/buku/edit/(:num)', 'BukuController::edit/$1');
$routes->post('/buku/update/(:num)', 'BukuController::update/$1');
$routes->get('/buku/delete/(:num)', 'BukuController::delete/$1');
$routes->get('/buku/stokHabis', 'BukuController::stokHabis');

// Pengadaan Routes
$routes->get('/pengadaan', 'PengadaanController::index');
