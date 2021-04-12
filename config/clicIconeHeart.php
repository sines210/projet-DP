<?php



$pictureId = //id  unique avec session auth, nom picture et $$

//peupler la bdd des noms pictures peut etre faire une autre table avec ts les noms et les récupérer pour la watchlist et mm pour la galerie

require 'bd/connexionDB.php';

$sql = 'INSERT INTO favoris (pseudo, email, password) VALUES (:pseudo, :email, :password)';
$newUser = $db->prepare($sql);
$newUser->bindValue(":pseudo", $log, PDO::PARAM_STR);
$newUser->bindValue(":email", $mail, PDO::PARAM_STR);
$newUser->bindValue(":password", $password, PDO::PARAM_STR);
$response = $newUser->execute();
return $response;