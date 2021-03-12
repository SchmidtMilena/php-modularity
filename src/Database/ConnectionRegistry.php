<?php

declare(strict_types=1);

namespace PhpModularity\Database;

use PDO;
use PhpModularity\Core\Config\DatabaseConfig;
use PhpModularity\Database\Interfaces\ConnectionInterface;

class ConnectionRegistry implements ConnectionInterface
{
    private static ?PDO $pdo = null;
    private static array $config;
    private static string $connectionString;

    public static function getPDOInstance(): PDO
    {
        $config = new DatabaseConfig();
        self::$config = $config->getDatabase();
        self::$connectionString = self::$config['driver'] .
            ':host=' . self::$config['host'] .
            ';dbname=' . self::$config['database'];

        if (self::$pdo === null) {
            self::$pdo = new PDO(self::$connectionString, self::$config['username'], self::$config['password']);
        }
        return self::$pdo;
    }

}
