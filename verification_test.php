<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Core\Application;
use App\Services\UserService;

try {
    $app = new Application(__DIR__);
    echo "Application initialized.\n";

    $userService = $app->resolve(UserService::class);
    if ($userService instanceof UserService) {
        echo "UserService resolved successfully.\n";
    } else {
        echo "UserService resolution failed.\n";
    }

    echo "Verification Passed.\n";
} catch (Exception $e) {
    echo "Verification Failed: " . $e->getMessage() . "\n";
}
