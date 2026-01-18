<?php

namespace Core;

class Controller
{
    protected array $middlewares = [];

    public function render($view, $params = [])
    {
        return Application::getInstance()->view->render($view, $params);
    }

    public function validate(array $data, array $rules)
    {
        $validator = new Validator();
        $validator->validate($data, $rules);

        if ($validator->fails()) {
            Application::getInstance()->session->setFlash('errors', $validator->errors());
            Application::getInstance()->session->setFlash('old', $data);
            back(); // Helper we need to create
        }

        return $data; // or valid data
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
