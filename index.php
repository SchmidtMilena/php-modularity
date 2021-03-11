<?php

require __DIR__ . '/config/bootstrap.php';
require_once __DIR__ . '/src/Routing/web.php';

$router->direct($_SERVER['REQUEST_URI']);

