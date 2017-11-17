<?php
$host = 'localhost';    //127.0.0.1
$db = 'yegoshin'; //ManagingTablesAndDatabases
$user = 'yegoshin'; //root
$password = 'neto1339'; //null
$charset = 'utf8';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password);
if ($pdo) {
    //echo "Успех!<br>";
} else {
    echo "Ошибка!<br>".E_ERROR;
    exit();
}
