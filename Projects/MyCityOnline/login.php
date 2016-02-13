<?php
if (isset($_POST['pseudo'], $_POST['password']) && $_POST['pseudo'] && $_POST['password']) {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $password = sha1($_POST['password']);
    require_once 'functions/check_login.php';
    if (check_login($pseudo, $password)) {
        echo 'Log On';
    } else {
        echo 'Log Error';
    }
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

    <section>
        <form method="post" action="login.php" id="login">
            <p>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo"/>

                <br/>

                <label for="password">Password :</label>
                <input type="password" name="password" id="password"/>

                <br/>

                <input type="submit" value="Login"/>
            </p>
        </form>
    </section>

    <footer>
        <a href="login.php">Administration</a>
    </footer>

</div>
</body>
</html>