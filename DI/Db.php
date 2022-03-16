<?php

namespace DI;

use PDO;

class Db
{
    private PDO $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:host=mariadb;dbname=hillel_db', 'hillel_user', 'hillel_pwd');
    }

    public function query(string $sql, array $params = [], $class = \stdClass::class): array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $class);
    }
}