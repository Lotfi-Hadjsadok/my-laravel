<?php

use Router\Router;

require_once '../vendor/autoload.php';

$router = new Router($_GET['url']);
$router->get('/','App\Controllers\BlogController@index');
$router->get('/post/:id/:char','App\Controllers\BlogController@show');
$router->run();