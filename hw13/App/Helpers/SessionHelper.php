<?php

namespace MVC\App\Helpers;

class SessionHelper
{
    public static function isUserLoggedIn(): bool
    {
        return !empty($_SESSION['user_data']);
    }

    public static function getUserId(): array
    {
        return $_SESSION['user_data']['id'];
    }

    public static function setUserData($id, $email = null, ...$args): void
    {
        $_SESSION['user_data'] = array_merge([
            'id' => $id,
            'email' => $email
        ], $args);
    }

    public static function destroyUserData(): void
    {
        session_destroy();
    }
}