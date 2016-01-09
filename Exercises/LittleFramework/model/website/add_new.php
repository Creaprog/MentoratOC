<?php
function add_new($title, $text, $author)
{
    global $bdd;

    $req = $bdd->prepare('INSERT INTO news (title, text, creation, author) VALUES(?, ?, NOW(), ?)');
    $req->execute(array($title, $text, $author));
}