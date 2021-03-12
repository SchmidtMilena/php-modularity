<?php

declare(strict_types=1);

namespace PhpModularity\Database;

use PDO;
use PhpModularity\Database\Interfaces\ConnectionInterface;
use PhpModularity\Core\Config\Interfaces\DatabaseConfigInterface;

class Connection implements ConnectionInterface
{
    private PDO $pdo;

    public function __construct(DatabaseConfigInterface $config)
    {
        $credentials = $config->getDatabaseCredentials();
        $connectionString = $credentials['driver'] .
            ':host=' . $credentials ['host'] .
            ';dbname=' . $credentials ['database'];
        $this->pdo = new PDO($connectionString, $credentials['username'], $credentials['password']);
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}
