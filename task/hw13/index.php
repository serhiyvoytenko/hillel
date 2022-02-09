<?php

include_once __DIR__."/../vendor/autoload.php";
use MVC\App\Models\User;

//$user = new User();
var_dump(User::getAll(), User::getOne('test@test.com', 'email'));

$data = [
    "username" => "serg55",
    "email" => "test565@test.com",
    "password" => "pass123",
    "first_name" => "serg2",
    "last_name" => "bbb",
    "birthday" => "2000-03-05",
];



var_dump(User::update($data, 2));