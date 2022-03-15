<?php

require "../vendor/autoload.php";

try {
    $controller = new \DI\UserController();
    echo $controller->handle();
} catch (Throwable $exception) {
    echo 'Error: ' . $exception->getMessage();
}