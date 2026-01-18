<?php

namespace Core\Http;

use Core\Application;
use Core\View\View;

class Router
{
    protected array $routes = [];
    public Request $request;
    public Response $response;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
    }

    public function get(string $path, callable|array $callback): void
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post(string $path, callable|array $callback): void
    {
        $this->routes['post'][$path] = $callback;
    }

    public function getRoutes(): array
    {
        return $this->routes;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        
        // Match route with implementation of dynamic params would go here
        // For simplicity, strict match first, or iterate for regex
        
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            // Try Dynamic Routes matching
            foreach ($this->routes[$method] as $route => $action) {
                $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $route);
                if (preg_match("#^$pattern$#", $path, $matches)) {
                    array_shift($matches); // remove full match
                    $callback = $action;
                    // We might need to store params to pass them
                    $this->request->setRouteParams($matches);
                    break;
                }
            }
        }

        if (!$callback) {
            $this->response->setStatusCode(404);
            return $this->renderView('errors.404');
        }

        if (is_array($callback)) {
            /** @var \App\Controllers\Controller $controller */
            $controller = Application::getInstance()->resolve($callback[0]);
            $callback[0] = $controller;
            
            // Check Middleware
            foreach ($controller->getMiddlewares() as $middleware) {
                $middleware->execute();
            }
        }

        return call_user_func_array($callback, [
            $this->request,
            ...$this->request->getRouteParams()
        ]);
    }

    public function renderView($view, $params = [])
    {
        return Application::getInstance()->view->render($view, $params);
    }
}
