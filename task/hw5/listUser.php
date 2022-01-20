<?php

include_once __DIR__ . "/config.php";

$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;

$command = 'SELECT id FROM users';

$dbh = new PDO($dsn, DB_USER, DB_PWD);

if (empty($_POST)) {
    $stmt = $dbh->query($command);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($data);
}

echo '<a href="listUser.php">All users</a>';
echo '<ul>';
foreach ($data as $value){
    echo '<li><a href="listUser.php?id='.$value['id'].'">'.$value['id'].'</a></li>';
}
echo '</ul>';