<?php

require_once BOOTSTRAP_PATH . 'routes.php';

use DI\Container;

use SimpleApi\Core\SimpleApiLoader;
use Pecee\SimpleRouter\SimpleRouter;

function router(Container $container): void 
{
    SimpleRouter::setCustomClassLoader(new SimpleApiLoader($container));
    SimpleRouter::setDefaultNamespace('SimpleApi\Controllers');    
    SimpleRouter::start();
};
