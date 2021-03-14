<?php

require __DIR__ . '/config/bootstrap.php';

use PhpModularity\Requests\BaseRequest;

$router = require(__DIR__ . '/src/Routing/web.php');
$router->direct(new BaseRequest());

