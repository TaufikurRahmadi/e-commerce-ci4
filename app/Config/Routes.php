<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// routes user
$routes->get('/', 'Toko::tampilan');
$routes->get('/toko/payment', 'Toko::payment');

$routes->get('/toko', 'Toko::tampilan');
$routes->get('/toko/create', 'Toko::create');
$routes->post('/toko/store', 'Toko::store');
$routes->get('/toko/edit/(:num)', 'Toko::edit/$1');
$routes->get('/toko/store/detail(:num)', 'Toko::detail/$1');
$routes->get('/toko/detail/(:num)', 'Toko::detail/$1');
$routes->post('/toko/addToCart/(:num)', 'Toko::addToCart/$1');
$routes->post('/toko/detail/addToCart/(:num)', 'Toko::addToCart/$1');
$routes->get('/toko/addToCart/(:num)', 'Toko::addToCart/$1');
$routes->post('/toko/deletefromcart/(:num)', 'Toko::deletefromcart/$1');
$routes->delete('toko/deletefromcart/(:num)', 'Toko::deletefromcart/$1');
$routes->get('/toko/delete/(:num)', 'Toko::deletefromcart/$1');
// $routes->get('/toko/pesan', 'OrderController::checkout');
$routes->post('checkout', 'Toko::checkout', ['filter' => 'auth']); // Pastikan hanya pengguna login yang bisa checkout
$routes->post('/toko', 'toko::saveMessage');
$routes->get('payment/process/(:any)', 'PaymentController::process/$1');


$routes->get('/toko', 'OrderuserController::userorder');
$routes->get('/toko', 'OrderuserController::userOrder');
$routes->get('/toko', 'OrderuserController::index');
$routes->get('/toko', 'OrderuserController::index');
$routes->get('admin/index', 'toko::getPendingOrders');
$routes->get('admin/index', 'OrderController::getPendingOrders');

$routes->get('midtrans/checkout/(:num)', 'MidtransController::checkout/$1');
$routes->post('midtrans/createTransaction/(:num)', 'MidtransController::createTransaction/$1');
$routes->post('midtrans/createTransaction/(:num)', 'MidtransController::createTransaction/$1');



$routes->get('orders', 'Toko::orders', ['filter' => 'auth']); // Pastikan pengguna harus login


//routes admin
$routes->get('/toko/admin', 'toko::admin', ['filter' => 'role:admin']);
$routes->get('/toko/admin/barang', 'toko::barang', ['filter' => 'role:admin']);
$routes->get('/toko/admin/create', 'Toko::create', ['filter' => 'role:admin']);
$routes->post('/toko/admin/store', 'Toko::store',['filter' => 'role:admin']);
$routes->get('/toko/admin/edit/(:num)', 'Toko::update/$1',['filter' => 'role:admin']);
$routes->post('/toko/edit/update/(:num)', 'Toko::update/$1',['filter' => 'role:admin']);
$routes->delete('/toko/delete/(:num)', 'Toko::delete/$1',['filter' => 'role:admin']);

$routes->get('/toko/admin/pesanan', 'OrderController::', ['filter' => 'auth']); // Menampilkan daftar pesanan
$routes->post('/toko/admin/pesanan/update/(:num)', 'OrderController::update/$1', ['filter' => 'auth']); // Mengubah status pesanan
$routes->post('/toko/admin/pesanan/delete/(:num)', 'OrderController::delete/$1', ['filter' => 'auth']); // Menghapus pesanan



$routes->post('/toko/deletefromcart/(:num)', 'Toko::deleteFromCart/$1');

$routes->post('/deletefromcart/(:num)', 'Toko::deletefromcart/$1');
// $routes->get('/toko', 'Toko::keranjang');

$routes->post('/toko/admin/deletemasukan/(:num)', 'toko::deletemassage/$1',['filter' => 'role:admin']); // Route untuk menghapus pesan

$routes->get('/toko/admin/pesanan', 'OrderController::index',['filter' => 'role:admin']);

$routes->get('/auth/register', 'Home::register');
$routes->get('/auth/login', 'Home::index');

$routes->post('toko/deletefromcart/(:num)', 'Toko::deletefromcart/$1');


$routes->post('/toko/deletefromcart/(:num)', 'Toko::deletefromcart/$1');
