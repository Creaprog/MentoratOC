<?php
require_once 'config/db.php';
function get_research($element)
{
    $results = [];

    $element = '%' . $element . '%';

    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM news WHERE title LIKE :element OR content LIKE :element');
    $req->bindParam(':element', $element, PDO::PARAM_STR);
    $req->execute();

    $news = $req->fetchAll();

    array_push($results, $news);

    $req = $bdd->prepare('SELECT * FROM informations WHERE title LIKE :element OR content LIKE :element');
    $req->bindParam(':element', $element, PDO::PARAM_STR);
    $req->execute();

    $infos = $req->fetchAll();

    array_push($results, $infos);

    return $results;

}