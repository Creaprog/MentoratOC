<?php
session_start();
require_once '../config/db.php';
require_once '../ajax/ajax_check_acess.php';
function add_activitie($title, $image, $content)
{
    $pseudo = $_SESSION['pseudo'];
    $acess = ajax_check_access($pseudo);

    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO activities VALUES ("", :title, :image, :content, :acess, "activitee")');
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':image', $image, PDO::PARAM_STR);
    $req->bindParam(':content', $content, PDO::PARAM_STR);
    $req->bindParam(':acess', $acess, PDO::PARAM_INT);


    $req->execute();

}