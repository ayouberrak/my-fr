<?php

namespace App\Controllers;

use Core\Application;
use Core\Security\Validator;
use Core\Http\Middleware;

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
            back();
        }

        return $data;
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
