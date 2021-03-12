<?php

declare(strict_types=1);

namespace PhpModularity\Repositories\Abstracts;

use PDO;
use PhpModularity\Database\ConnectionRegistry;

abstract class AbstractRepository
{
    protected const FETCH_STYLE = PDO::FETCH_CLASS;
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = ConnectionRegistry::getPDOInstance();
    }
}
