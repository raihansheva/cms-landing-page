<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// default
$routes->get('/', 'LoginController::login');

// dashboard
$routes->get('/dashboard', 'Home::index');
// -----------

// banner
$routes->get('/konten', 'Home::content');
// -----------

// solusi
$routes->get('/solusi', 'Home::solusi');
// -----------

// fitur
$routes->get('/fitur', 'Home::fitur');
$routes->get('/detail-fitur', 'Home::detailfitur');
// -----------

// crud banner
$routes->post('/tambahbanner', 'BannerController::add');
// -----------

