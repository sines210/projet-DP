<?php


  
$userName = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$dsn =  $_ENV['DSN'];




try {
    $db = new PDO($dsn, $userName, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}