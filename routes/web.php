<?php

use Core\Application;

/** @var \Core\Http\Router $router */
$router = Application::getInstance()->router;

$router->get('/', function () use ($router) {
    return $router->renderView('welcome.index');
});
