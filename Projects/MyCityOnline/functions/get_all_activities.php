<?php
require_once 'config/db.php';
function get_all_activities(){
    global $bdd;

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, instant, title, description FROM activities ORDER BY ID');
    $req->execute();

    $activities = $req->fetchAll();

    return $activities;
}