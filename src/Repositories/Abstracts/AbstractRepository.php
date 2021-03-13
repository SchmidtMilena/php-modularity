<?php

declare(strict_types=1);

namespace PhpModularity\Repositories\Abstracts;

use PDO;
use PhpModularity\Database\Connection;
use PhpModularity\Core\Config\DatabaseConfig;

abstract class AbstractRepository
{
    protected const FETCH_STYLE = PDO::FETCH_CLASS;
    protected PDO $pdo;

    public function __construct(DatabaseConfig $config)
    {
        $connection = new Connection($config);
        $this->pdo = $connection->getPdo();
    }
}
