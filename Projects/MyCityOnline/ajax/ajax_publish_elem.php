<?php
require_once '../config/db.php';
function ajax_publish_elem($type, $id)
{

    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('UPDATE ' . $type . ' SET publish = 1 WHERE ID = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

}