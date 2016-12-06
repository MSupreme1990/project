<?php

require(__DIR__ . '/../vendor/autoload.php');

use Mindy\Component\Application\App;
use Symfony\Component\Debug\Debug;

Debug::enable();

App::createInstance(\App\AppKernel::class, 'dev', true)->run();