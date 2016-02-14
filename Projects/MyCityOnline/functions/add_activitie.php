<?php
require_once '../config/db.php';
function add_activitie($title, $image, $content)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO activities VALUES ("", :title, :image, :content, 1, "activitee")');
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':image', $image, PDO::PARAM_STR);
    $req->bindParam(':content', $content, PDO::PARAM_STR);


    $req->execute();
}