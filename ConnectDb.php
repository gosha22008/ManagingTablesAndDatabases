<?php
$host = 'localhost';    //127.0.0.1
$db = 'ManagingTablesAndDatabases'; //Lesson13(4.2)
$user = 'root'; //root
$password = null; //null
$charset = 'utf8';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $password);
if ($pdo) {
    //echo "Успех!<br>";
} else {
    echo "Ошибка!<br>".E_ERROR;
    exit();
}
