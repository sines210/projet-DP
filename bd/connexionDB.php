<?php



$userName = "i_s";
$pass = "MarseilleSimplon";
$host = "localhost";
$dbName = "covidart";




try {
    $db = new PDO("mysql:host=$host;dbname=$dbName", $userName, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}