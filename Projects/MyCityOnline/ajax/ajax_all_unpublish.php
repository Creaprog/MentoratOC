<?php
require_once '../config/db.php';
function ajax_all_unpublish()
{
    global $bdd;
    $unpublish = [];

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $bdd->prepare('SELECT * FROM news WHERE publish = 0 ORDER BY ID');
    $req->execute();

    $news = $req->fetchAll();

    if ($news) {
        array_push($unpublish, $news);
    }

    $req = $bdd->prepare('SELECT * FROM informations WHERE publish = 0 ORDER BY ID');
    $req->execute();

    $infos = $req->fetchAll();

    if ($infos) {
        array_push($unpublish, $infos);
    }

    $req = $bdd->prepare('SELECT * FROM activities WHERE publish = 0 ORDER BY ID');
    $req->execute();

    $activities = $req->fetchAll();

    if ($activities) {
        array_push($unpublish, $activities);
    }
    return $unpublish;
}