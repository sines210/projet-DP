<?php
require "functions.php";

unset($_SESSION['username']);

header('Location: index.php?page=home');
