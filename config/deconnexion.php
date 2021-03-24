<?php
require "fonction.php";

unset($_SESSION['id']);

header('Location: index.php?page=connexion');
