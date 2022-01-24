<?php

include_once __DIR__ . "/config.php";

$dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;

$command = 'INSERT INTO
    `users` (name, surname, age, email, phone)
    VALUES
        (:name, :surname, :age, :email, :phone)';

$dbh = new PDO($dsn, DB_USER, DB_PWD);

if (isset($_POST['name'])) {
    $data['name'] = filter_var($_POST['name'], FILTER_SANITIZE_STRING);

    $stmt = $dbh->prepare($command);
    $stmt->execute($_POST);
}

echo <<<FORM
    <form action='' method='post'>
        <ul>
            <li>
                <label for="name">Name:</label>
                <input type='text' id="name" name='name'>
            </li>
            <li>
                <label for="surname">Surname:</label>
                <input type='text' id="surname" name='surname'>
            </li>
            <li>
                <label for="age">Age:</label>
                <input type="number" id="age" name='age'>
            </li>
            <li>
                <label for="email">Email:</label>
                <input type='email' id="email" name='email'>
            </li>
            <li>
                <label for="phone">Phone:</label>
                <input type='text' id="phone" name='phone'>
            </li>
            <li>
                <button type='submit'>Create user</button>
            </li>
        </ul>
        </form>
FORM;
