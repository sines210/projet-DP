<?php 

class Authentification {


    public $login;
    public $password;

  
       public function read(): array
        {
            require 'bd/connexionDB.php';
            $sql = 'SELECT pseudo, pass FROM user WHERE pseudo = :pseudo';
            $getUser = $db->prepare($sql);
            $getUser->bindValue(":pseudo", $login, PDO::PARAM_STR);
            $getUser->bindValue(":pass", $password, PDO::PARAM_STR);
            $getUser->execute();
            $response = $getUser->fetch(PDO::FETCH_ASSOC);
            return $response;
        }
    }


