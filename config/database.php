<?php

return [

    'default' => $_ENV['DB_CONNECTION'] ?? 'mysql',

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'url' => $_ENV['DATABASE_URL'] ?? null,
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'database' => $_ENV['DB_DATABASE'],
            'username' => $_ENV['DB_USERNAME'],
            'password' => $_ENV['DB_PASSWORD'],
            'unix_socket' => getenv('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => getenv('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => getenv('DATABASE_URL'),
            'host' => getenv('DB_HOST', '127.0.0.1'),
            'port' => getenv('DB_PORT', '5432'),
            'database' => getenv('DB_DATABASE', 'forge'),
            'username' => getenv('DB_USERNAME', 'forge'),
            'password' => getenv('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => getenv('DATABASE_URL'),
            'host' => getenv('DB_HOST', 'localhost'),
            'port' => getenv('DB_PORT', '1433'),
            'database' => getenv('DB_DATABASE', 'forge'),
            'username' => getenv('DB_USERNAME', 'forge'),
            'password' => getenv('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],

    ],
];