<?php

require(__DIR__ . '/../vendor/autoload.php');

use Mindy\Application\App;

if (php_sapi_name() !== 'cli') {
    $whoops = (new \Whoops\Run());
    if (strpos($_SERVER['REQUEST_URI'], '/api') === false) {
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
    } else {
        $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler());
    }
    $whoops->register();
}

App::createInstance(AppKernel::class, 'dev', true)->run();