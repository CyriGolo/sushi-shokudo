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

$router->post('/confirmation', 'OrderController@confirmation');


$router->run();
