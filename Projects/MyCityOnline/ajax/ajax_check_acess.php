<?php
require_once '../config/db.php';
function ajax_check_access($pseudo)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $req = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();

    $access = $req->fetch();

    if($access['grade'] === "Unpublish"){
        return 0;
    }else{
        return 1;
    }
}