<?php

declare(strict_types=1);

namespace PhpModularity\Controllers;

use PhpModularity\Repositories\UserRepository;

class WelcomeController
{
    public function index()
    {
        $users = new UserRepository();
        return var_dump($users->fetchAll());
    }
}
