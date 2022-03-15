<?php

function myAutoloaderAll($class)
{
    if (file_exists(__DIR__ . "/App/" . str_replace('\\', '/', $class) . ".php")) {
        require_once(__DIR__ . "/App/" . str_replace('\\', '/', $class) . ".php");

    } else {
        throw new Exception('File ' . $class . '.php not found');
    }
}

spl_autoload_register('myAutoloaderAll');

use Models\User;
use Models\Order;
use Models\Product;
use Http\Controllers\MainController;
use Http\Controllers\Admin\DashboardController;
use Http\Controllers\Admin\OrdersController;
use Http\Helpers\ImageHelper;

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
    echo $exception->getMessage();
}
