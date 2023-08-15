<?php

declare (strict_types = 1);

use DI\Container;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

function persistence(Container $container): void
{

    $isDevMode = $_ENV['ENVIRONMENT'] === 'develop';

    $config = ORMSetup::createAttributeMetadataConfiguration(
        [ENTITIES_PATH],
        $isDevMode
    );

    $params = require_once SETUP_PATH . 'database.php';
    $connection = DriverManager::getConnection($params, $config);

    Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');
    $connection->getDatabasePlatform()->registerDoctrineTypeMapping('uuid', 'uuid');

    $entityManager = new EntityManager($connection, $config);
    $container->set(EntityManager::class, $entityManager);
};
