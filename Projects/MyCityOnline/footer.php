<?php
if (isset($_SESSION['pseudo'], $_SESSION['password']) && $_SESSION['pseudo'] && $_SESSION['password']) {

    $logon = true;

} else {
    $logon = false;
}
?>
<?php if ($logon) { ?><a href="logout.php">Se deconecter</a><br/><a href="admin.php">Panel
    administration</a><?php } else { ?><a href="login.php">Se connecter</a><br/><?php } ?>