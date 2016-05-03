<?php
session_start();
require_once '../config/db.php';
require_once '../ajax/ajax_check_acess.php';
function add_new($title, $image, $content)
{
    $pseudo = $_SESSION['pseudo'];
    $acess = ajax_check_access($pseudo);
    if ($acess != 0) {
        $acess = 1;
    } else {
        $acess = 0;
    }
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO news VALUES (NULL, :title, :content, :image, :acess, "new")');
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':content', $content, PDO::PARAM_STR);
    $req->bindParam(':image', $image, PDO::PARAM_STR);
    $req->bindParam(':acess', $acess, PDO::PARAM_INT);

    $req->execute();
}