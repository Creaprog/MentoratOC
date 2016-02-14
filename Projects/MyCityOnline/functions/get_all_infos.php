<?php
require_once 'config/db.php';
function get_all_infos()
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM informations WHERE publish = 1 ORDER BY ID');
    $req->execute();

    $informations = $req->fetchAll();

    return $informations;
}