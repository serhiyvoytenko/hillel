<?php

namespace MVC\App\Controllers;

use MVC\Core\View;

class AuthController
{
    public function login()
    {
        View::render('auth/login');
    }

    public function register()
    {
        View::render('auth/register');
    }
}