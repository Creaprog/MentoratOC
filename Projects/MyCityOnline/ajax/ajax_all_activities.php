<?php
session_start();
require_once '../config/db.php';
require_once '../ajax/ajax_check_acess.php';
function ajax_all_activities()
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pseudo = $_SESSION['pseudo'];
    $acess = ajax_check_access($pseudo);
    if($acess == 0){
        $req = $bdd->prepare('SELECT * FROM activities WHERE publish = 0 ORDER BY ID');
    }else{
        $req = $bdd->prepare('SELECT * FROM activities ORDER BY ID');
    }

    $req->execute();

    $informations = $req->fetchAll();

    return $informations;
}