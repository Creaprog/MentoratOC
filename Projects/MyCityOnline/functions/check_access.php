<?php
require_once 'config/db.php';
function check_access($pseudo)
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $req = $bdd->prepare('SELECT * FROM users WHERE pseudo = :pseudo');
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();

    $access = $req->fetch();

    switch ($access['grade']) {
        case 'Unpublish':
            return 0;
            break;
        case 'Publish':
            return 1;
            break;
        case 'Admin':
            return 2;
            break;
    }
}