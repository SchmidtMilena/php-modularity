<?php

require __DIR__ . '/config/bootstrap.php';
use PhpModularity\Requests\BaseRequest;
$dotenv = Dotenv\Dotenv::createImmutable(realpath($_SERVER["DOCUMENT_ROOT"]));
$dotenv->load();


$router = require(__DIR__ . '/src/Routing/web.php');

$router->direct(new BaseRequest($_REQUEST, $_SERVER['REQUEST_URI']));

