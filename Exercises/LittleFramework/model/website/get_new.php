<?php
function get_new($offset)
{
    global $bdd;
    $offset = (int)$offset;

    $req = $bdd->prepare('SELECT id, title, text, DATE_FORMAT(creation,\'%d/%m/%Y à %Hh%imin\') AS date_fr, author FROM news WHERE id = :offset');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->execute();
    $news = $req->fetchAll();

    return $news;

}