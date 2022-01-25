<?php

require_once '../vendor/autoload.php';

use App\Http\Controllers\MainController;
use App\Http\Helpers\ImageHelper;
use Models\Order;
use Models\User;

new MainController();
new Order();
new User();
new ImageHelper();