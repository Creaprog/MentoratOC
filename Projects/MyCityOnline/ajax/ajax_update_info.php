<?php
require_once '../config/db.php';
function ajax_update_info($id, $title, $image, $content)
{

    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('UPDATE informations SET title = :title, content = :content, image = :image WHERE ID = :id');
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':content', $content, PDO::PARAM_STR);
    $req->bindParam(':image', $image, PDO::PARAM_STR);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();

}