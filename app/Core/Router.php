<?php

namespace App\Core;

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
            return "404 Not Found";
        }

        if (is_array($callback)) {
            /** @var \App\Core\Controller $controller */
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
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::getInstance()->basePath . "/views/$view.php";
        return ob_get_clean();
    }
}
