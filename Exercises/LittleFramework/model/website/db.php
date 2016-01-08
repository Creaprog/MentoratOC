<?php
// Connexion with pdo to mysql
include_once "config.php";
$bdd = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASS);
