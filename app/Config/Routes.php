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
$routes->get('/tampilkonten', 'Home::tampilcontent');
// -----------

// solusi
$routes->get('/solusi', 'Home::solusi');
$routes->post('/tambahsolusi', 'SolusiController::addsolusi');
$routes->post('/ubahsolusi', 'SolusiController::ubahsolusi');
$routes->post('/hapussolusi', 'SolusiController::hapussolusi');
// -----------

// fitur
$routes->get('/fitur', 'Home::fitur');
$routes->post('/tambahfitur', 'FiturController::tambahfitur');
$routes->post('/ubahfitur', 'FiturController::ubahfitur');
$routes->post('/hapusfitur', 'FiturController::hapusfitur');

$routes->get('/detail-fitur', 'Home::detailfitur');
// -----------

// paket harga
$routes->get('/paketharga', 'Home::paketharga');
$routes->post('/tambahharga', 'HargaController::tambahharga');
$routes->post('/ubahharga', 'HargaController::ubahharga');
$routes->post('/hapusharga', 'HargaController::hapusharga');


// crud banner
$routes->post('/tambahbanner', 'BannerController::add');
// -----------

