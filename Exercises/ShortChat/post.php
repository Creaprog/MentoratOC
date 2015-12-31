<?php
session_start();
if(isset($_POST['pseudo'], $_POST['message'])&&$_POST['pseudo']&&$_POST['message']){
    $author = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }

    $req = $bdd->prepare('INSERT INTO messages (author, message, moment) VALUES(?, ?, NOW())');
    $req->execute(array($author, $message));

    $_SESSION['pseudo'] = $author;

    header('Location: index.php');
}else{
    echo 'Thank to complete the form before click on submit button';
}
