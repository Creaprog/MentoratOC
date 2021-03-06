<?php
require_once 'config/db.php';
function get_last_new($offset, $limit)
{

    global $bdd;

    $offset = (int)$offset;
    $limit = (int)$limit;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT * FROM news WHERE publish = 1 ORDER BY ID DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();

    $news = $req->fetch();

    return $news;

}