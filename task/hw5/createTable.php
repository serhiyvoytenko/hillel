<?php

include_once __DIR__."/config.php";

$dsn = "mysql:dbname=".DB_NAME.";host=".DB_HOST;

$dbh = new PDO($dsn, DB_USER, DB_PWD);
var_dump($dbh);

echo '<form action="" method="get">
    <button type="submit" value="createTable">Create Table</button>
    </form>';
