<?php

if (!function_exists('asset')) {
    function asset($path)
    {
        $baseUrl = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
        return $baseUrl . '/' . ltrim($path, '/');
    }
}

if (!function_exists('storage_path')) {
    function storage_path($path = '')
    {
        return __DIR__ . '/../../public/uploads/' . ltrim($path, '/');
    }
}
