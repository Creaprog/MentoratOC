<?php
require_once '../config/db.php';
function ajax_get_new($id)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, title, content, image FROM news WHERE ID = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $new = $req->fetch();

    return $new;
}