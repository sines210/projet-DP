<?php
require 'functions.php';

$error = null;

if(isset($_POST['login']) && isset($_POST['password'])){
    $typedLogin = htmlspecialchars($_POST['login']);
    $typedPassword = htmlspecialchars($_POST['password']);
    $arrayUser = read($login, $password);
    
    if( password_verify($typedPassword, $arrayUser['pass'])){
        // session_start();
        $_SESSION['username'] = $arrayUser['pseudo'];
        header('Location: index.php?page=galerie');
    }
    else
    {$error = 'erreur';}
}

  