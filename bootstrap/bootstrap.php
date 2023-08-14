<?php

require_once SETUP_PATH . 'doctrine.php';
require_once SETUP_PATH . 'router.php';

use DI\Container;
function bootstrap(Container $container): void {
    $dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
    $dotenv->load();
    
    doctrine($container);
    router($container);
}
