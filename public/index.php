<?php

session_start();

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

$router = new App\Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');

$router->get('/login', 'UserController@showLogin');
$router->get('/register', 'UserController@showRegister');
$router->post('/register', 'UserController@register');
$router->post('/login', 'UserController@login');
$router->get('/logout', 'UserController@logout');

$router->get('/travel', 'HomeController@travel');
$router->get('/travel/:id', 'OrderController@reservation');
$router->post('/travel/:id', 'OrderController@reservationConfirm');

$router->get('/filtred/:id', 'HomeController@filtredTravel');

$router->post('/confirmation', 'OrderController@confirmation');

$router->get('/admin', 'AdminController@dashboard');

$router->get('/admin/updateTravel/:id', 'AdminController@updateTravel');
$router->post('/admin/updateTravel/:id', 'AdminController@updateTravel');
$router->get('/admin/deleteTravel/:id', 'AdminController@deleteTravel');

$router->get('/admin/updateUser/:id', 'AdminController@updateUser');
$router->post('/admin/updateUser/:id', 'AdminController@updateUser');
$router->get('/admin/deleteUser/:id', 'AdminController@deleteUser');

$router->get('/admin/updateOrder/:id', 'AdminController@updateOrder');
$router->post('/admin/updateOrder/:id', 'AdminController@updateOrder');
$router->get('/admin/deleteOrder/:id', 'AdminController@deleteOrder');

$router->run();
