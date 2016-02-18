<?php
require_once 'config/db.php';
function get_info($id)
{

    global $bdd;

    $id = (int)$id;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM informations WHERE publish = 1 AND ID = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $informations = $req->fetchAll();

    return $informations;

}