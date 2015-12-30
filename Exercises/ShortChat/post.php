<?php
try {
    $bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Error : ' . $e->getMessage());
}

$req = $bdd->prepare('INSERT INTO messages (author, message, moment) VALUES(?, ?, NOW())');
$req->execute(array($_POST['pseudo'], $_POST['message']));

header('Location: index.php');