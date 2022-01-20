<?php

include_once __DIR__ . "/config.php";

$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;

$command = 'SELECT id FROM users';
$selectUser = 'SELECT * From users WHERE id = :id';
$data = [];
$user = [];
$dbh = new PDO($dsn, DB_USER, DB_PWD);

if (empty($_GET)) {
    $stmt = $dbh->query($command);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

echo '<a href="listUser.php">All users</a>';
echo '<ul>';
foreach ($data as $value) {
    echo '<li><a href="listUser.php?id=' . $value['id'] . '">' . $value['id'] . '</a></li>';
}
echo '</ul>';

if (!empty($_GET['id'])) {
    $stmt = $dbh->prepare($selectUser);
    $stmt->execute($_GET);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

echo '<ul>';
foreach ($user as $key => $value) {
    echo '<li>' . ucfirst($key) . ' : ' . $value . '</li>';
}
echo '</ul>';