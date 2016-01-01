<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css"/>
    <title>Short chat</title>
</head>

<body>
<form action="post.php" method="post">
    <p>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo" id="pseudo" value="<?php if (!empty($_SESSION['pseudo'])) {
            echo $_SESSION['pseudo'];
        } ?>"/>
        <br/>
        <label for="message">Message :</label>
        <input type="text" name="message" id="message"/>
        <br/>
        <input type="submit" value="Send"/>
    </p>
</form>

<?php
try {
    //Connexion with bdd
    $bdd = new PDO('mysql:host=localhost;dbname=chat;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    //Get error
    die('Error : ' . $e->getMessage());
}
$resp = $bdd->query('SELECT author, message, moment FROM messages ORDER BY moment DESC LIMIT 0, 10');
while ($message = $resp->fetch()) {
    //Print the result of query and re write date in french
    echo '<p>Le ' . date("d/m/Y à H:i ", strtotime($message['moment'])) . '<strong>' . htmlspecialchars($message['author']) . '</strong> : ' . htmlspecialchars($message['message']) . '</p>';
}

$resp->closeCursor();
?>

</body>
</html>
