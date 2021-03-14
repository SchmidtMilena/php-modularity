<?php

use PhpModularity\Routing\Router;
use PhpModularity\Controllers\WelcomeController;
use PhpModularity\Core\Container\AppDIContainer;

return $router = new Router([
    '/' => ['type' => 'GET', 'controller' => WelcomeController::class, 'method' => 'index'],
    'index' => ['type' => ['GET', 'POST'], 'controller' => WelcomeController::class, 'method' => 'index']
], new AppDIContainer());

