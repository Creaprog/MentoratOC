<?php
require_once '../config/db.php';
function ajax_del_elem($type, $id)
{

    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('DELETE FROM ' . $type . ' WHERE ID = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

}