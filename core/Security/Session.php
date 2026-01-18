<?php

namespace Core\Security;

class Session
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            // Secure Session Settings
            ini_set('session.cookie_httponly', 1);
            ini_set('session.cookie_samesite', 'Lax');
            ini_set('session.cookie_secure', 1); // Ensure HTTPS is used for true security
            ini_set('session.use_only_cookies', 1);
            
            session_start();
        }

        // Initialize CSRF Token if not present
        if (!$this->get('_token')) {
            $this->set('_token', bin2hex(random_bytes(32)));
        }
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function setFlash($key, $message)
    {
        $_SESSION['flash'][$key] = $message;
    }

    public function getFlash($key)
    {
        $message = $_SESSION['flash'][$key] ?? false;
        unset($_SESSION['flash'][$key]);
        return $message;
    }
}
