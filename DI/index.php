<?php

use DI\Container;
use DI\UserController;

require "../vendor/autoload.php";

try {
    $controller = (new Container())->get(UserController::class);

//    dd($controller);
//    var_dump($controller);
    echo $controller->handle();
} catch (Throwable $exception) {
    echo 'Error: ' . $exception->getMessage();
}