<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../setup/definitions.php';
require_once BOOTSTRAP_PATH . 'bootstrap.php';

use DI\Container;

$container = new Container();

bootstrap($container);
