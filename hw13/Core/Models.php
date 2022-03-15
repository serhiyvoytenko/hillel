<?php

namespace MVC\Core;

use PDO;

class Models
{
    static protected string $tableName = "";
    static protected string $primaryKey = "id";

    public static function getAll(): bool|array
    {
        $query = "SELECT * FROM " . static::$tableName;
        return DB::getConnect()?->query($query)->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function getOne(int|string $id, ?string $column = null): bool|static
    {
        $column = $column ?: static::$primaryKey;
        $sql = "SELECT * FROM " . static::$tableName . " WHERE {$column} = :id LIMIT 1";
        $stmt = DB::getConnect()?->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchObject(static::class);
    }

    public static function create(array $data): int|false
    {
        $keys = array_keys($data);
        $fields = implode(', ', $keys);
        $placeholders = implode(', :', $keys);
        $query = "INSERT INTO " . static::$tableName . " ({$fields})  VALUES (:{$placeholders})";

        $stmt = DB::getConnect()?->prepare($query);
        $stmt->execute($data);
        return (int)DB::getConnect()?->lastInsertId();
    }

    public static function update(array $data, string $id): bool|static
    {
        $query = "UPDATE " . static::$tableName . ' SET ';

        $keys = [];

        foreach ($data as $key => $values) {
            $keys[] = " {$key}=:{$key}";
        }

        $query .= implode(', ', $keys);
        $query .= " WHERE id=:id";

        $stmt = DB::getConnect()?->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(":{$key}", $value);
        }

        $stmt->bindValue(":id", $id);

        return $stmt->execute();
    }

    public static function delete(int $id): bool
    {
        $query = 'DELETE FROM ' . static::$tableName . ' WHERE `id` = :id';

        $stmt = DB::getConnect()?->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
