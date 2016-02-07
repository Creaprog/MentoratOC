<?php
session_start();
if (isset($_POST['pseudo'], $_POST['password']) && $_POST['pseudo'] && $_POST['password']) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT pseudo, password FROM users WHERE pseudo = :pseudo AND password = :password');
    $req->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindParam(':password', $password, PDO::PARAM_STR);

    $req->execute();

    $result = $req->fetchColumn();

    if (!$result) {
        echo 'Login Failed !';
    } else {
        $_SESSION['user'] = $pseudo;
        echo 'You are now logged in';
    }
}