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
    <!--<link rel="stylesheet" href="css/styles.css"/> -->
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <body class="ie7">
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>My City Online</title>
</head>
<body>
<div id="block_body">
    <?php include('header.php'); ?>
    <div class="container theme-showcase" role="main" style="margin-top: 100px;">
        <section id="home" class="container">
            <h1 class="text-center">Bienvenue sur l'espace d'administration</h1>

            <p class="row" style="margin-top: 50px;">
                <button class="btn btn-warning" id="addNew"><?php if (($acces != 1) && ($acces != 2)) {
                        echo "Soumettre une news";
                    } else {
                        echo "Ajouter une news";
                    } ?></button>
                <button class="btn btn-warning" id="addInfo"><?php if (($acces != 1) && ($acces != 2)) {
                        echo "Soumettre une information";
                    } else {
                        echo "Ajouter une information";
                    } ?></button>
                <button class="btn btn-warning" id="addAct"><?php if (($acces != 1) && ($acces != 2)) {
                        echo "Soumettre une activité";
                    } else {
                        echo "Ajouter une activité";
                    } ?></button>
                <button class="btn btn-warning" id="getNews"><?php if (($acces != 1) && ($acces != 2)) {
                        echo "Modifier une news soumise";
                    } else {
                        echo "Modifier une news";
                    } ?></button>
                <button class="btn btn-warning" id="getInfos"><?php if (($acces != 1) && ($acces != 2)) {
                        echo "Modifier une information soumise";
                    } else {
                        echo "Modifier une information";
                    } ?></button>
                <button class="btn btn-warning" id="getAct"><?php if (($acces != 1) && ($acces != 2)) {
                        echo "Modifier une activité soumise";
                    } else {
                        echo "Modifier une activité";
                    } ?></button>
                <?php if ($acces != 0) { ?>
                    <button class="btn btn-warning" id="getPub">Publier des articles soumis</button><?php } ?>
            </p>

            <div id="dataLog">

            </div>

            <div class="table-responsive">
                <table class="activities table" id="recept">
                    <thead>

                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <div class="text-center">
        <?php include('footer.php'); ?>
    </div>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/research.js"></script>
</body>
</html>
