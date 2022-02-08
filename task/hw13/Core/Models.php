<?php

namespace MVC\Core;

class Models
{
    static protected string $tableName = "";
    static protected string $query = "";

    public static function getAll(): bool|array
    {
        $query = "SELECT * FROM ". static::$tableName;
        return DB::getConnect()?->query($query)->fetchAll();
    }

}