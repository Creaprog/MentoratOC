<?php
session_start();
require_once '../config/db.php';
require_once '../ajax/ajax_check_acess.php';
function ajax_all_news()
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pseudo = $_SESSION['pseudo'];
    $acess = ajax_check_access($pseudo);

    if ($acess == 0) {
        $req = $bdd->prepare('SELECT * FROM news WHERE publish = 0 ORDER BY ID');
    } else {
        $req = $bdd->prepare('SELECT * FROM news ORDER BY ID');
    }


    $req->execute();

    $news = $req->fetchAll();

    return $news;
}