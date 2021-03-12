<?php

declare(strict_types=1);

namespace PhpModularity\Entities;

use PhpModularity\Entities\Interfaces\EntityInterface;

class User implements EntityInterface
{
    private int $Id;
    private string $Nazwa;
    private string $Haslo;
    private const TABLE = 'users';

    public function getTableName(): string
    {
        return self::TABLE;
    }
}
