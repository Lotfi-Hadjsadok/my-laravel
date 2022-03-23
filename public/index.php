<?php

use Router\Router;

require_once '../vendor/autoload.php';

$router = new Router($_GET['url']);
$router->show();