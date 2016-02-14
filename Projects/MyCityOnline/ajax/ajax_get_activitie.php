<?php
require_once '../config/db.php';
function ajax_get_activitie($id)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM activities WHERE ID = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $new = $req->fetch();

    return $new;
}