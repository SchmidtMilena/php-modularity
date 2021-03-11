<?php

use PhpModularity\Controllers\WelcomeController;
use PhpModularity\Routing\Router;

return $router = new Router([
    'index' => ['type' => 'GET', 'controller' => WelcomeController::class, 'method' => 'index']
]);
