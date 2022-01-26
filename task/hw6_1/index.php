<?php

function myAutoloaderAll($class)
{
    if (file_exists(__DIR__."/App/Models/" . $class . ".php")) {
        require_once(__DIR__."/App/Models/" . $class . ".php");

    } elseif (file_exists(__DIR__ . "/App/Http/Controllers/" . $class . ".php")) {
        require_once __DIR__ . "/App/Http/Controllers/" . $class . ".php";

    } elseif (file_exists(__DIR__ . "/App/Http/Controllers/Admin/" . $class . ".php")) {
        require_once __DIR__ . "/App/Http/Controllers/Admin/" . $class . ".php";

    } elseif (file_exists(__DIR__ . "/App/Http/Helpers/" . $class . ".php")) {
        require_once __DIR__ . "/App/Http/Helpers/" . $class . ".php";

    } else {
        throw new Exception('Class not found');
    }
}

spl_autoload_register('myAutoloaderAll');

try {
  new DashboardController();
  new OrdersController();
  new MainController();
  new ImageHelper();
  new Order();
  new Product();
  new User();
  new User1();
} catch (Exception $exception) {
    echo 'Class not found!';
}
