<?php

declare (strict_types = 1);

namespace SimpleApi\Core;

use DI\Container;
use Pecee\SimpleRouter\ClassLoader\IClassLoader;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;

class SimpleApiLoader implements IClassLoader
{

    protected $container;
    public function __construct(Container $_container)
    {
        $this->container = $_container;
    }

    public function loadClass(string $class)
    {
        if (class_exists($class) === false) {
            throw new NotFoundHttpException(sprintf('Class "%s" does not exist', $class), 404);
        }

        try {
            return $this->container->get($class);
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage(), (int) $e->getCode(), $e->getPrevious());
        }
    }

    public function loadClassMethod($class, string $method, array $parameters)
    {
        try {
            return $this->container->call([$class, $method], $parameters);
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage(), (int) $e->getCode(), $e->getPrevious());
        }
    }

    public function loadClosure(callable $closure, array $parameters)
    {
        try {
            return $this->container->call($closure, $parameters);
        } catch (\Exception $e) {
            throw new NotFoundHttpException($e->getMessage(), (int) $e->getCode(), $e->getPrevious());
        }
    }
}
