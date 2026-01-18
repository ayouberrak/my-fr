<?php

use App\Core\Application;

/** @var \App\Core\Router $router */
$router = Application::getInstance()->router;

$router->get('/', function () use ($router) {
    return $router->renderView('welcome');
});
