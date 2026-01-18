<?php

use Core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

require_once __DIR__ . '/../routes/web.php';

$app->run();
