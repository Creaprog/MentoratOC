<?php
function get_news($offset, $limit)
{
    global $bdd;
    $offset = (int)$offset;
    $limit = (int)$limit;

    $req = $bdd->prepare('SELECT id, title, text, DATE_FORMAT(creation,\'%d/%m/%Y à %Hh%imin\') AS date_fr, author FROM news ORDER BY creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $news = $req->fetchAll();

    return $news;

}