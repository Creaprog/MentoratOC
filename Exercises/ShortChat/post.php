<?php
session_start();
if (isset($_POST['pseudo'], $_POST['message']) && $_POST['pseudo'] && $_POST['message']) {
    //Protection of xss
    $author = htmlspecialchars($_POST['pseudo']);
    $message = htmlspecialchars($_POST['message']);
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        die('Error : ' . $e->getMessage());
    }
    //Prepare query
    $req = $bdd->prepare('INSERT INTO messages (author, message, moment) VALUES(?, ?, NOW())');
    //Execute query with protected values
    $req->execute(array($author, $message));

    //Define the pseudo session
    $_SESSION['pseudo'] = $author;

    //Redirect to chat
    header('Location: index.php');
} else {
    //Else error print a error message
    echo 'Thank to complete the form before click on submit button';
}
