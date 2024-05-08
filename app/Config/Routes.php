<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Home::login');
$routes->get('/dashboard', 'Home::index');
$routes->get('/konten', 'Home::content');
$routes->get('/solusi', 'Home::solusi');
$routes->post('/tambahbanner', 'BannerController::add');

