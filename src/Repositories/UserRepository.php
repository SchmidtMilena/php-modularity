<?php

declare(strict_types=1);

namespace PhpModularity\Repositories;

use PhpModularity\Entities\User;
use PhpModularity\Repositories\Abstracts\AbstractRepository;

class UserRepository extends AbstractRepository
{
    private const ENTITY = User::class;
    private const TABLE = 'users';

    public function fetchAll()
    {
        $query = $this->pdo->query('SELECT * FROM ' . self::TABLE);
        return $query->fetchAll(self::FETCH_STYLE, self::ENTITY);
    }

}
