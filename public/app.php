<?php

require(__DIR__ . '/../vendor/autoload.php');

use Mindy\Application\App;

$application = App::createInstance(AppKernel::class, 'prod', false);

// Uncomment this line for enable reverse proxy cache
// $application->enableCache(\App\AppCache::class);

$application->run();