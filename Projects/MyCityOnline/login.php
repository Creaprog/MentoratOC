<?php
session_start();
if (isset($_POST['pseudo'], $_POST['password']) && $_POST['pseudo'] && $_POST['password']) {
    var_dump('totot');
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);
    require_once 'functions/check_login.php';
    if (check_login($pseudo, $password)) {
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['password'] = $password;
        header('Location: admin.php');
    }
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

<?php include('header.php'); ?>
<div class="container" style="margin-top: 50px;">
    <form method="post" action="login.php" style="margin-top: 50px;">
        <div class="form-group">
            <label for="pseudo">Compte :</label>
            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="compte" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" class="form-control" name="password" id="pseudo" placeholder="motdepasse" required>
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/research.js"></script>
</body>
</html>
