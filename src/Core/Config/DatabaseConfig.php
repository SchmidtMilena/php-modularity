<?php

declare(strict_types=1);

namespace PhpModularity\Core\Config;

use PhpModularity\Core\Config\Interfaces\DatabaseConfigInterface;

class DatabaseConfig implements DatabaseConfigInterface
{
    private const CONFIG_DIRECTORY = '/config/database.php';

    public function getDatabaseCredentials(): array
    {
        $config = require(realpath($_SERVER["DOCUMENT_ROOT"]). self::CONFIG_DIRECTORY);
        return $config['connections'][$config['default']];
    }
}
