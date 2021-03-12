<?php

declare(strict_types=1);

namespace PhpModularity\Database;

use PDO;
use PhpModularity\Core\Config\DatabaseConfig;
use PhpModularity\Database\Interfaces\ConnectionInterface;

class Connection implements ConnectionInterface
{
    private PDO $pdo;
    private DatabaseConfig $config;

    public function __construct()
    {
        $this->config = new DatabaseConfig();
        $config = $this->config->getDatabase();
        $connection = $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'];
        $this->pdo = new PDO($connection, $config['username'], $config['password']);
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

}
