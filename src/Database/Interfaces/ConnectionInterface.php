<?php

declare(strict_types=1);

namespace PhpModularity\Database\Interfaces;

use PDO;

interface ConnectionInterface
{
    public function getPdo(): PDO;
}


