<?php
// Connexion with pdo to mysql
require_once ROOT . '/config/config.php';
$bdd = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', DBUSER, DBPASS);
