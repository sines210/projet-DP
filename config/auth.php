<?php

require 'Authentification.php';

$error = null;


    if(isset($_POST['login']) && isset($_POST['password'])) {
        $typedLogin = htmlspecialchars($_POST['login']);
        $typedPassword = htmlspecialchars($_POST['password']);
     
        $arrayUser=read($typedLogin);
        // var_dump($arrayUser[0]); die; 
               
        if( password_verify($typedPassword,  $arrayUser['pass'])){
            $_SESSION['username'] = $typedLogin;
          return   header('Location: index.php?page=chat');
        }
     
        else
        {$error = 'erreur';} 
}


  