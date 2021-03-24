<?php
if (!function_exists("is_connected")) {
    function is_connected(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return !empty($_SESSION['id']);
    }
}

if (!function_exists("create")) {
    function create(string $log, string $mail, string $password): bool
    {
        require 'bd/connexionDB.php';
        $sql = 'INSERT INTO user (pseudo, mail, password) VALUES (:pseudo, :mail, :password)';
        $newUser = $db->prepare($sql);
        $newUser->bindValue(":pseudo", $log, PDO::PARAM_STR);
        $newUser->bindValue(":mail", $mail, PDO::PARAM_STR);
        $newUser->bindValue(":password", $password, PDO::PARAM_STR);
        $response = $newUser->execute();
        return $response;
    } 
}


if (!function_exists('read')) {
    function read(string $login): array
    {
        require 'bd/connexionDB.php';
        $sql = 'SELECT * FROM user WHERE pseudo = :pseudo';
        $getUser = $db->prepare($sql);
        $getUser->bindValue(":pseudo", $login, PDO::PARAM_STR);
        // $getUser->bindValue(":pass", $password, PDO::PARAM_STR);
        $getUser->execute();
        $response = $getUser->fetch(PDO::FETCH_ASSOC);
        return $response;
    }
}
