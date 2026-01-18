<?php

namespace App\Core;

class Controller
{
    protected array $middlewares = [];

    public function render($view, $params = [])
    {
        return Application::getInstance()->router->renderView($view, $params);
    }
    
    public function registerMiddleware(Middleware $middleware): void
    {
        $this->middlewares[] = $middleware;
    }

    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
