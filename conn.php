<?php 

$host = "localhost:3308";
$db_name = "msuriders";
$username = "root";
$password = "Bilaosrrmmmjg02311";

try {
    $dsn = "mysqli:host=$host;db_name=$db_name;charset=UTF8;";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo $e->getMessage();
}