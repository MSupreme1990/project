<?php

require(__DIR__ . '/../vendor/autoload.php');

use Mindy\Component\Application\App;

$application = App::createInstance(\App\AppKernel::class, 'prod', false);

// Uncomment this line for enable reverse proxy cache
// $application->enableCache(\App\AppCache::class);

$application->run();