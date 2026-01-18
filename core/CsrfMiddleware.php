<?php

namespace Core;

use Exception;

class CsrfMiddleware extends Middleware
{
    public function execute()
    {
        $method = $_SERVER['REQUEST_METHOD'];

        // Methods that require CSRF verification
        if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'])) {
            
            $sessionToken = Application::getInstance()->session->get('_token');
            $requestToken = $_POST['_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;

            if (!$requestToken || !hash_equals($sessionToken, $requestToken)) {
                $this->handleFailure();
            }
        }
    }

    protected function handleFailure()
    {
        http_response_code(419);
        echo "419 | Page Expired (CSRF Mismatch)";
        exit();
    }
}
