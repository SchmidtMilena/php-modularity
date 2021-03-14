<?php

require dirname(__DIR__).'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(realpath($_SERVER["DOCUMENT_ROOT"]));
$dotenv->load();




