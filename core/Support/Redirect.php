<?php

namespace Core\Support;

use Core\Security\Session;

class Redirect
{
    protected string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    public function with($key, $message)
    {
        Application::getInstance()->session->setFlash($key, $message);
        return $this;
    }

    public function __destruct()
    {
        header("Location: " . $this->url);
        exit;
    }
}
