<?php

namespace MVC\App\Validators;

use MVC\App\Models\User;

class UserCreateValidator
{
    protected array $errors = [
        'first_name_error' => 'The name should contain more than 2 letters',
        'last_name_error' => 'The name should contain more than 2 letters',
        'birthday_error' => 'Birthdate date is invalid',
        'email_error' => 'Email is invalid',
        'password_error' => 'Tha password should contain more than 7 letter',
        'username_error' => 'The name should contain more than 2 letters',
    ];

    protected array $rules = [
        'first_name' => '/[A-Za-zА-Яа-я]{2,}/',
        'last_name' => '/[A-Za-zА-Яа-я]{2,}/',
        'birthday' => '/[\d]{4}-[\d]{2}-[\d]{2}/', // 2020-02-15
        'email' => '/^[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i',  // 'admin@admin.com'
        'password' => '/[a-zA-Z0-9.!#$%&\'*+\/\?^_`{|}~-]{8,}/',
        'username' => '/[A-Za-zА-Яа-я]{2,}/',
    ];

    public function validate($fields): bool
    {
        foreach ($fields as $key => $field) {
            if (preg_match($this->rules[$key], $field)) {
                unset($this->errors["{$key}_error"]);
            }
        }

        return empty($this->errors);
    }


    public function checkEmailOnExists(string $email): bool
    {
        $result = false;
        if (User::getOne($email, 'email')) {
            $this->errors = [
                'email_error' => 'User with this email already exists'
            ];
            $result = true;
        }

        return $result;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}