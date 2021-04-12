<?php
require "functions.php";
$error = null;


if (isset($_POST['pseudo']) && isset($_POST['password']) && isset($_POST['checkPassword'])) {
    $mail=  htmlspecialchars($_POST['mail']);
    $login = htmlspecialchars($_POST['pseudo']);
    $password = htmlspecialchars($_POST['password']);
    $checkPassword = htmlspecialchars($_POST['checkPassword']);
    if ($password !== $checkPassword) {
            $error = "Les mots de passe ne correspondent pas";
    }  
    else if(strlen($password)< 4){
        $error = 'Le mot de passe doit contenir au moins 4 caractères';
    }
     else {  
        // criptage du password
        $encryptedPass = password_hash($password, PASSWORD_BCRYPT);
        
        // insertion dans la bdd et connexion
        if (create($mail, $login, $encryptedPass)) {
            // session_start();
            $_SESSION['username'] = $login;
            header("Location: index.php?page=galerie");
        }
    }
} 
  