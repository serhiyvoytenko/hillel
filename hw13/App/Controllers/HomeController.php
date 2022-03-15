<?php

namespace MVC\App\Controllers;

use MVC\Core\Controller;
use MVC\Core\View;

class HomeController extends Controller
{
    public function index(): void
    {
        View::render('home/index');
    }
}