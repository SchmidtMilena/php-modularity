<?php

declare(strict_types=1);

namespace PhpModularity\Repositories\Abstracts;

use PDO;
use PhpModularity\Database\Connection;

abstract class AbstractRepository
{
    protected const FETCH_STYLE = PDO::FETCH_CLASS;
    protected PDO $pdo;

    public function __construct()
    {
        $connection = new Connection();
        $this->pdo = $connection->getPdo();
    }
}
