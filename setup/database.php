<?php

return [
    'driver' => $_ENV['DATABASE_DRIVER'],
    'user' => $_ENV['DATABASE_USER'],
    'port' => $_ENV['DATABASE_PORT'],
    'host' => $_ENV['DATABASE_HOST'],
    'password' => $_ENV['DATABASE_PASSWORD'],
    'dbname' => $_ENV['DATABASE_NAME'],
];
