<?php
session_start();
if (isset($_SESSION['pseudo'], $_SESSION['password']) && $_SESSION['pseudo'] && $_SESSION['password']) {
    $pseudo = htmlspecialchars($_SESSION['pseudo']);
    $password = htmlspecialchars($_SESSION['password']);
    require_once 'functions/check_login.php';
    if (check_login($pseudo, $password) == false) {
        header('Location: login.php');
    } else {
        require_once 'functions/check_access.php';
        $acces = check_access($pseudo);
    }
} else {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="css/styles.css"/>
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <body class="ie7">
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <title>My City Online</title>
</head>
<body>
<div id="block_body">
    <?php include('header.php'); ?>

    <section id="home">
        <h1>Bienvenue sur l'espace d'administration du site</h1>

        <p>
            <button id="addNew"><?php if (($acces != 1) && ($acces != 2)) {
                    echo "Soumettre une new";
                } else {
                    echo "Ajouter une new";
                } ?></button>
            <button id="addInfo"><?php if (($acces != 1) && ($acces != 2)) {
                    echo "Soumettre une information";
                } else {
                    echo "Ajouter une information";
                } ?></button>
            <button id="addAct"><?php if (($acces != 1) && ($acces != 2)) {
                    echo "Soumettre une activitée";
                } else {
                    echo "Ajouter une activitée";
                } ?></button>
            <button id="getNews"><?php if (($acces != 1) && ($acces != 2)) {
                    echo "Modifier une new soumis";
                } else {
                    echo "Modifier une new";
                } ?></button>
            <button id="getInfos"><?php if (($acces != 1) && ($acces != 2)) {
                    echo "Modifier une information soumis";
                } else {
                    echo "Modifier une information";
                } ?></button>
            <button id="getAct"><?php if (($acces != 1) && ($acces != 2)) {
                    echo "Modifier une activitée soumis";
                } else {
                    echo "Modifier une activitée";
                } ?></button>
            <?php if ($acces != 0) { ?>
                <button id="getPub">Publier des article soumis</button><?php } ?>
        </p>

        <div id="dataLog">

        </div>

        <table class="activities" id="recept">
            <thead>

            </thead>

            <tbody>

            </tbody>
        </table>
    </section>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
