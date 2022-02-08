<?php

namespace MVC\Core;

use PDO;

require_once __DIR__.'/../Config/constants.php';

class DB
{
    static private ?PDO $connection = null;

    public static function getConnect(): PDO|null
    {
        if (static::$connection === null) {
            static::$connection = new PDO(
                "mysql:host=".DB_HOST.";dbname=".DB_NAME.";".DB_USER.",".DB_PASSWORD
            );
        }
        return static::$connection;
    }
}