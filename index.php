<?php

declare(strict_types=1);

use FilmRental\Framework\DiContainer;
use FilmRental\Framework\Router;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once './vendor/autoload.php';


// Load custom DI container:
$container = new DiContainer();
$container->loadDependencies();

// Use custom Router:
$requestUri = str_replace('/FilmRental', '', $_SERVER['REQUEST_URI']);

$router = $container->get(Router::class);
$router->process($requestUri, $_POST);


