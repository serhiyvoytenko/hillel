<?php

namespace MVC\App\Controllers;


use MVC\App\Validators\UserCreateValidator;
use MVC\Core\Controller;
use MVC\App\Models\User;
use MVC\Core\View;
use MVC\App\Helpers\SessionHelper;

class UsersController extends Controller
{

    public function store(): void
    {
        $fields = filter_input_array(INPUT_POST, $_POST, 1);
        $validator = new UserCreateValidator();
        if ($validator->validate($fields) && !$validator->checkEmailOnExists($fields['email'])) {

            $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);

            $user = User::create($fields);

            if ($user) {
                site_redirect('login');
            }
        }
        $this->data['data'] = $fields;
        $this->data += $validator->getErrors();

        View::render('auth/register', $this->data);
    }

    public function auth(): void
    {
        if (User::getOne($_POST['email'], 'email')) {

            $user = User::getOne($_POST['email'], 'email');

            if (password_verify($_POST['password'], $user->password)) {
                SessionHelper::destroyUserData();
                session_start();
                SessionHelper::setUserData((int)$user->id, $user->email);
                site_redirect('');
            }
        }
        site_redirect('login');
    }

    public function logout(): void
    {
        SessionHelper::destroyUserData();
        site_redirect('login');
    }

}
