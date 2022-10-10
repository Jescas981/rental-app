<?php

use Controllers\AuthController;
use Core\Route;
use Core\Router;

include_once __DIR__ . '/../vendor/autoload.php';


$router = new Router([
    Route::get('/', [AuthController::class, 'index'])
]);

$router->resolve();
