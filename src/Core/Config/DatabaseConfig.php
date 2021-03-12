<?php

declare(strict_types=1);

namespace PhpModularity\Core\Config;

class DatabaseConfig
{
    private const CONFIG_DIRECTORY = '/config/database.php';

    public function getDatabase(): array
    {
        $config = require(realpath($_SERVER["DOCUMENT_ROOT"]). self::CONFIG_DIRECTORY);
        return $config['connections'][$config['default']];
    }
}
