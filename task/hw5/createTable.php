<?php

include_once __DIR__ . "/config.php";

$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;

$command = 'CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY,
            name VARCHAR (255) NOT NULL,
            surname VARCHAR (255) NOT NULL,
            age INT, 
            email VARCHAR (100) NOT NULL UNIQUE, 
            phone VARCHAR (12) UNIQUE   
            )';

$dbh = new PDO($dsn, DB_USER, DB_PWD);

$ifExistTable = $dbh->query('SHOW TABLES LIKE "users"');

if (isset($_POST['createTable'])) {
    $dbh->exec($command);
    echo 'Table created!';

} elseif ($ifExistTable->fetch()) {
    echo 'Table exist!';

} else {
    echo
    "<form action='' method='post'>
        <input type='hidden' name='createTable' value='createTable'>
        <button type='submit'>Create Table</button>
        </form>";
}
