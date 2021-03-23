<?php

declare(strict_types=1);

namespace PhpModularity\Entities;

use PhpModularity\Entities\Interfaces\EntityInterface;

class User implements EntityInterface
{
    private int $id;
    private string $name;
    private string $password;
    private const TABLE = 'users';

    public function getTableName(): string
    {
        return self::TABLE;
    }
}
