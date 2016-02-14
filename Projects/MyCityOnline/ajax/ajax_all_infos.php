<?php
require_once '../config/db.php';
function ajax_all_infos()
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, title, content, image FROM informations ORDER BY ID');
    $req->execute();

    $informations = $req->fetchAll();

    return $informations;
}