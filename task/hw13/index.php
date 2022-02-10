<?php

include_once __DIR__."/../vendor/autoload.php";
include_once __DIR__ . '/Config/constants.php';
use MVC\App\Models\User;

//$user = new User();
//var_dump(User::getAll(), User::getOne('test@test.com', 'email'));
//
//$data = [
//    "username" => "serg5671",
//    "email" => "test56671@test.com",
//    "password" => "pass123",
//    "first_name" => "serg2",
//    "last_name" => "bbb",
//    "birthday" => "2000-03-05",
//];



//var_dump(User::update($data, 2));

//User::create($data);
//User::delete(15);

try {
    $router = new MVC\Core\Router();

    require_once BASE_DIR . '/routes/web.php';

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])) {
        $router->dispatch($_SERVER['REQUEST_URI']);
    }
} catch (Exception $e) {
    var_dump($e);
}

