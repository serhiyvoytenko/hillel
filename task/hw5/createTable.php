<?php

include_once __DIR__."/config.php";

$dsn = "mysql:dbname=".DB_NAME.";host=".DB_HOST;

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


$dbh = new PDO($dsn, DB_USER, DB_PWD, $opt);

$stmt = $dbh->query('SELECT * FROM cars');

foreach ($stmt->fetch() as $row){
//    var_dump($row);
    echo $row.'<br>';
}
//$str = $dbh->query();

var_dump($dbh, $stmt->fetchAll());



echo '<form action="" method="get">
    <button type="submit" value="createTable">Create Table</button>
    </form>';
