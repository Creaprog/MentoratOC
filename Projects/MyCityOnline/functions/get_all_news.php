<?php
require_once 'config/db.php';
function get_all_news()
{
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, title, content, image FROM news ORDER BY ID');
    $req->execute();

    $news = $req->fetchAll();

    return $news;
}