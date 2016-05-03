<?php
if (isset($_SESSION['pseudo'], $_SESSION['password']) && $_SESSION['pseudo'] && $_SESSION['password']) {

    $logon = true;

} else {
    $logon = false;
}
?>
<?php if ($logon) { ?><a href="logout.php">Se déconnecter</a><br/><a href="admin.php">Panel
    d'administration</a><?php } else { ?><a href="login.php" class="btn btn-success" style="margin-top: 50px;">Se
    connecter</a><br/><?php } ?>