<?php

declare(strict_types=1);

namespace PhpModularity\Core\Config\Interfaces;

interface DatabaseConfigInterface
{
    public function getDatabaseCredentials(): array;
}
