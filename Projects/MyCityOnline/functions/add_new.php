<?php
require_once '../config/db.php';
function add_new($title, $image, $content)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO news VALUES ("", :title, :content, :image, 1, "new")');
    $req->bindParam(':title', $title, PDO::PARAM_STR);
    $req->bindParam(':content', $content, PDO::PARAM_STR);
    $req->bindParam(':image', $image, PDO::PARAM_STR);

    $req->execute();
}