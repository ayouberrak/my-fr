<?php

if (!function_exists('asset')) {
    function asset($path)
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'] ?? 'localhost';
        return $protocol . $host . '/' . ltrim($path, '/');
    }
}

function storage_path($path = '')
{
    return __DIR__ . '/../../public/uploads/' . ltrim($path, '/');
}


if (!function_exists('logger')) {
    function logger($message, $level = 'INFO')
    {
        \Core\Application::getInstance()->resolve(\Core\Support\Logger::class)->log($message, $level);
    }
}
if (!function_exists('csrf_token')) {
    function csrf_token()
    {
        return \Core\Application::getInstance()->session->get('_token');
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field()
    {
        return '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    }
}

if (!function_exists('redirect')) {
    function redirect($path)
    {
        return new \Core\Support\Redirect($path);
    }
}

if (!function_exists('back')) {
    function back()
    {
        return redirect($_SERVER['HTTP_REFERER'] ?? '/');
    }
}
