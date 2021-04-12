<?php
// if (!function_exists("is_connected")) {
//     function is_connected(): bool
//     {
//         if (session_status() === PHP_SESSION_NONE) {
//             session_start();
//         }
//         return !empty($_SESSION['username']);
//     }
// }

if (!function_exists("create")) {
    function create( string $mail, string $log, string $password): bool
    {
        require 'bd/connexionDB.php';
        $sql = 'INSERT INTO user (email, pseudo, pass) VALUES (:email, :pseudo , :pass)';
        $newUser = $db->prepare($sql);
        $newUser->bindValue(":email", $mail, PDO::PARAM_STR);
        $newUser->bindValue(":pseudo", $log, PDO::PARAM_STR);
        $newUser->bindValue(":pass", $password, PDO::PARAM_STR);
        $response = $newUser->execute();
        return $response;
    } 
}

  

