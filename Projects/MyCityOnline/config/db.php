<?php
// Connexion with pdo to mysql
$bdd = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME . ';charset=utf8', DBUSER, DBPASS);
