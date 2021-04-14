<?php 



    if (!function_exists('read')) {

 function read($login) :array
{
    require 'bd/connexionDB.php';


  

    try { 
         $sql = 'SELECT pseudo, pass FROM user WHERE pseudo = :pseudo';
        $getUser = $db->prepare($sql);
          $getUser->bindValue(":pseudo", $login, PDO::PARAM_STR);
        $getUser->execute();
        $rep = $getUser->fetch(PDO::FETCH_ASSOC);
        return $rep;
    } catch (PDOException $e) {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
}

  
}


