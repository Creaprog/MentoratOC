<?php
session_start();
require_once 'functions/get_last_new.php';
$news = get_last_new(0, 1);
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

    <div id="last_new">
        <a href="<?php echo 'news.php?id=' . $news['id']; ?>"><img class="last_new" src="<?php echo $news['image']; ?>"
                                                                   alt="last_new"></a>

        <h1 id="last_new_text"><?php echo $news['title']; ?></h1>
    </div>

    <section id="home">
        <h1>Quisque tristique posuere massa egetcs</h1>

        <img src="images/index/home.jpg" alt="home">

        <p>
            Quisque ac tortor venenatis est ornare fermentum eu vel ante. Curabitur a lectus urna. Nunc pellentesque
            nisi at justo malesuada, tincidunt feugiat ex fringilla. Vivamus bibendum auctor magna, vitae elementum
            risus gravida dictum. Fusce aliquam accumsan congue. Maecenas fermentum quam pretium varius consequat.
            Curabitur id aliquam tortor. Vestibulum nulla neque, cursus eu nunc id, mattis efficitur lectus.
            Pellentesque vel luctus lorem. Maecenas id dapibus dolor.
            Quisque ac tortor venenatis est ornare fermentum eu vel ante. Curabitur a lectus urna. Nunc pellentesque
            nisi at justo malesuada, tincidunt feugiat ex fringilla. Vivamus bibendum auctor magna, vitae elementum
            risus gravida dictum. Fusce aliquam accumsan congue. Maecenas fermentum quam pretium varius consequat.
            Curabitur id aliquam tortor. Vestibulum nulla neque, cursus eu nunc id, mattis efficitur lectus.
            Pellentesque vel luctus lorem. Maecenas id dapibus dolor.
        </p>
        <ul>
            <li><a href="#">Actualités</a></li>
            <li><a href="#">Plus d'infos</a></li>
            <li><a href="#">Activités du mois</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </section>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/research.js"></script>
</body>
</html>