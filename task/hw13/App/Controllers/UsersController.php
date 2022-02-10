<?php

namespace MVC\App\Controllers;


use MVC\App\Validators\UserCreateValidator;
use MVC\Core\Controller;
use MVC\App\Models\User;
use MVC\Core\View;

class UsersController extends Controller
{

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST, 1);
        $validator = new UserCreateValidator();

        if ($validator->validate($fields) && !$validator->checkEmailOnExists($fields['email'])) {
            $user = User::create($fields);

            if ($user) {
                site_redirect('login');
            }
        }
        $this->data['data'] = $fields;
        $this->data += $validator->getErrors();

        View::render('auth/register', $this->data);
    }

}