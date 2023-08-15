<?php

declare (strict_types = 1);

require_once SETUP_PATH . 'persistence.php';
require_once SETUP_PATH . 'routing.php';

use DI\Container;

function bootstrap(Container $container): void
{
    $dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
    $dotenv->load();

    persistence($container);
    routing($container);
}
