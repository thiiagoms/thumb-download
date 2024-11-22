<?php

use DI\ContainerBuilder;

require __DIR__.'/vendor/autoload.php';

$dependencies = require_once __DIR__.'/config/dependencies.php';

$containerDI = new ContainerBuilder;
$containerDI->useAutowiring(true);

$containerDI->addDefinitions($dependencies);

/** @var \DI\Container $container */
$container = $containerDI->build();
