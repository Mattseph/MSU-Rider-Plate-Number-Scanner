<?php

$host = "localhost:3308";
$db_name = "msuriders";
$username = "root";
$password = "Bilaosrrmmmjg02311_";

$dsn = "mysql:host=$host;db_name=$db_name;charset=UTF8;";
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}
