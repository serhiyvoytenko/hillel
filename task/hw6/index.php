<?php

require_once '../vendor/autoload.php';

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Helpers\ImageHelper;
use Models\Order;
use Models\User;
use Models\Product;

new MainController();
new Order();
new User();
new Product();
new ImageHelper();
new DashboardController();
new OrdersController();