<?php 


if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{ 
    $page = 'home';
}


if($page === 'home'){
    require "views/home.php";
}

if($page === 'contact'){
    require "views/contact.php";
}

if($page === 'galerie'){
    require "views/galerie.php";
}

if($page === 'galerie2'){
    require "views/galerie2.php";
}

if($page === 'galerie3'){
    require "views/galerie3.php";
}

if($page === 'chat'){
    require "views/chat.php";
}

if($page === 'favoris'){
    require "views/favoris.php";
}

if($page === 'inscription'){
    require "views/inscription.php";
}

if($page === 'connexion'){
    require "views/connexion.php";
}

if($page === 'deconnexion'){
    require "config/deconnexion.php";
}

if($page === 'clicIconeHeart'){
    require "views/clicIconeHeart.php";
}

if($page === 'clicIconeChat'){
    require "views/clicIconeChat.php";
}

if($page === 'favoris'){
    require "views/favoris.php";
}