<?php

session_start();

require '../config/config.php';
require '../vendor/autoload.php';
require APP . 'helper.php';

$router = new App\Router($_SERVER["REQUEST_URI"]);

$router->get('/', 'HomeController@index');
$router->get('/menu', 'HomeController@showMenu');

$router->get('/login', 'UserController@showLogin');

$router->post('/login', 'UserController@login');

$router->run();
