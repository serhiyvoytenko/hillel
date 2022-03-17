<?php

use DI\Container;
use DI\UserController;

require "../vendor/autoload.php";

try {
    $controller = (new Container())->get(UserController::class);
//    $controller = (new Container())->get(\DI\Db::class);

//    dd($controller);
//    var_dump(UserController::class);
    echo "<br>".$controller->handle();
} catch (Throwable $exception) {
    echo 'Error: ' . $exception->getMessage();
}