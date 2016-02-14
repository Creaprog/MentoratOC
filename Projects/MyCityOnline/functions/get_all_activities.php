<?php
require_once 'config/db.php';
function get_all_activities()
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM activities WHERE publish = 1 ORDER BY ID');
    $req->execute();

    $informations = $req->fetchAll();

    return $informations;
}