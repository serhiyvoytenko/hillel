<?php

namespace MVC\App\Models;

use MVC\Core\Models;

/**
 * @property $username
 * @property $id
 * @property $email
 * @property $password
 */
class User extends Models
{
    static protected string $tableName = "blog_users";
}