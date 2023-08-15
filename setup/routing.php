<?php

declare (strict_types = 1);

require_once BOOTSTRAP_PATH . 'routes.php';

use DI\Container;
use Pecee\SimpleRouter\SimpleRouter;
use SimpleApi\Core\SimpleApiLoader;

function routing(Container $container): void
{
    SimpleRouter::setCustomClassLoader(new SimpleApiLoader($container));
    SimpleRouter::setDefaultNamespace('SimpleApi\Controllers');
    SimpleRouter::start();
};
