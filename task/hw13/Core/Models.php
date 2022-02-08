<?php

namespace MVC\Core;

use PDO;

class Models
{
    static protected string $tableName = "";
    static protected string $query = "";
    static protected string $primaryKey = "id";

    public static function getAll(): bool|array
    {
        $query = "SELECT * FROM ". static::$tableName;
        return DB::getConnect()?->query($query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getOne(int|string $id, ?string $column = null): bool|static
    {
        $column = $column ?: static::$primaryKey;
        $sql = "SELECT * FROM ".static::$tableName." WHERE {$column} = :id LIMIT 1";
        $stmt = DB::getConnect()?->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchObject(static::class);
    }
}
