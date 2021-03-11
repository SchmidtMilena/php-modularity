<?php

declare(strict_types=1);

namespace PhpModularity\Controllers;

use PhpModularity\Repositories\UserRepository;

class WelcomeController
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->fetchAll();
    }
}
