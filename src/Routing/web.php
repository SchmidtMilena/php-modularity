<?php

use PhpModularity\Controllers\WelcomeController;
use PhpModularity\Routing\Router;

return $router = new Router([
    '' => ['type' => 'GET', 'controller' => WelcomeController::class, 'method' => 'index'],
    'index' => ['type' => 'GET', 'controller' => WelcomeController::class, 'method' => 'index']
]);
