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
$routes->post('/tambahbanner', 'BannerController::addbanner');
$routes->post('/ubahbanner', 'BannerController::ubahbanner');
$routes->post('/hapusbanner', 'BannerController::hapusbanner');
// -----------

// solusi
$routes->get('/solusi', 'Home::solusi');
$routes->post('/tambahsolusi', 'SolusiController::addsolusi');
$routes->post('/ubahsolusi', 'SolusiController::ubahsolusi');
$routes->post('/ubahheadersolusi', 'SolusiController::ubahheadersolusi');
$routes->post('/hapussolusi', 'SolusiController::hapussolusi');
// -----------

// fitur
$routes->get('/fitur', 'Home::fitur');
$routes->post('/tambahfitur', 'FiturController::tambahfitur');
$routes->post('/ubahfitur', 'FiturController::ubahfitur');
$routes->post('/hapusfitur', 'FiturController::hapusfitur');

$routes->get('/detail-fitur/(:num)', 'Home::detailfitur/$1');
$routes->post('/tambahdetailfitur', 'FiturController::tambahdetailfitur');
$routes->post('/ubahdetailfitur', 'FiturController::ubahdetailfitur');
$routes->post('/hapusdetailfitur', 'FiturController::hapusdetailfitur');
$routes->get('/fitur/getdatafitur', 'FiturController::get_data_fitur');
// $routes->post('/tiket/getTiketData', 'Tiket::getTiketData');
// -----------

// artikel
$routes->get('/artikel', 'Home::artikel');
$routes->post('/tambahartikel', 'ArtikelController::tambahartikel');
$routes->post('/ubahartikel', 'ArtikelController::ubahartikel');
$routes->post('/ubahheaderartikel', 'ArtikelController::ubahheadertikel');
$routes->post('/hapusartikel', 'ArtikelController::hapusartikel');

// paket harga
$routes->get('/paketharga', 'Home::paketharga');
$routes->post('/tambahharga', 'HargaController::tambahharga');
$routes->post('/ubahharga', 'HargaController::ubahharga');
$routes->post('/hapusharga', 'HargaController::hapusharga');
$routes->get('/harga/getdataharga', 'HargaController::get_data_harga');


$routes->get('/benefit/(:num)', 'Home::benefit/$1');




$routes->get('/tentangkami', 'Home::tentangkami');
$routes->post('/tambahtentangkami', 'TentangKamiController::tambahtentangkami');
$routes->post('/ubahtentangkami', 'TentangKamiController::ubahtentangkami');
$routes->post('/ubahbannerinformasi', 'TentangKamiController::ubahheadtentangkami');
$routes->post('/hapustentangkami', 'TentangKamiController::hapustentangkami');
// crud banner
// -----------

