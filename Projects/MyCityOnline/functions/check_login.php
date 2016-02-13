<?php
require_once 'config/db.php';
function check_login($pseudo, $password)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $req = $bdd->prepare('SELECT pseudo, password FROM users WHERE pseudo = :pseudo AND password = :password');
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':password', $password, PDO::PARAM_STR);
    $req->execute();

    $logOn = $req->fetchColumn();

    if (!$logOn) {
        return false;
    } else {
        return true;
    }
}