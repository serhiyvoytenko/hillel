<?php

include_once __DIR__."/../vendor/autoload.php";
use MVC\App\Models\User;

//$user = new User();
var_dump(User::getAll(), User::getOne(5));