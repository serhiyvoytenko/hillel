<?php

include_once __DIR__ . "/config.php";

$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;

$command = 'SELECT id FROM users';
$deleteUser = 'DELETE FROM users WHERE id=:id';
$data = [];
$dbh = new PDO($dsn, DB_USER, DB_PWD);

if (empty($_GET)) {
    $stmt = $dbh->query($command);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (!empty($_GET)) {
    $stmt = $dbh->prepare($deleteUser);
    $arrayId = array_keys($_GET);
    foreach ($arrayId as $id) {
        $stmt->execute(array(':id' => $id));
    }
    echo 'User(s) deleted successfully <br>';
}

echo '<a href="delUser.php">All users</a>';
echo '<form action="" method="get">';
echo '<ul>';
foreach ($data as $value) {
    echo '<li>' . $value['id'] . '<input type="checkbox" name="' . $value['id'] . '"></li>';
}
echo '</ul>';
echo '<button type="submit">Delete user</button>';
echo '</form>';
