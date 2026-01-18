<?php

use Core\Application;

/** @var \Core\Router $router */
$router = Application::getInstance()->router;

$router->get('/', function () use ($router) {
    return $router->renderView('welcome.index');
});
