<?php

use App\Core\Application;
use App\Controllers\UserController;

/** @var \App\Core\Router $router */
$router = Application::getInstance()->router;

$router->get('/', function () {
    return "Hello Freamwork";
});

$router->get('/users', [UserController::class, 'index']);
