<?php
require_once 'config/db.php';
function get_new($id)
{

    global $bdd;

    $id = (int)$id;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM news WHERE publish = 1 AND ID = :id');
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

    $news = $req->fetchAll();

    return $news;

}