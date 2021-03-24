<?php
require 'functions.php';

$error = null;

if(isset($_POST['pseudo']) && isset($_POST['password'])){
    $typedLogin = htmlspecialchars($_POST['pseudo']);
    $typedPassword = htmlspecialchars($_POST['password']);
    $arrayUser = read($typedLogin);
    
    if(password_verify($typedPassword, $arrayUser['password'])){
        // session_start();
        $_SESSION['id'] = $arrayUser['pseudo'];
        header('Location: index.php?page=tchat');
    }
    else
    {$error = 'erreur';}
}

