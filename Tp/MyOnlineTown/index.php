<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="style.css"/>
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <body class="ie7">
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <title>Panda - Ville</title>
</head>
<body>
<div id="block_body">
    <?php include('header.php'); ?>

    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, title, content, image FROM news ORDER BY ID DESC LIMIT 0,1');
    $req->execute();

    $result = $req->fetch();
    ?>
    <div id="last_new">
        <a href="<?php echo $result['id']; ?>"><img class="last_new" src="<?php echo $result['image']; ?>" alt="last_new"></a>

        <h1 id="last_new_text"><?php echo $result['title']; ?></h1>
    </div>

    <section id="home">
        <h1>Quisque tristique posuere massa egetcs</h1>

        <img src="pictures/home.jpg" alt="home">

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
        <a href="#">Administration</a>
    </footer>

</div>

</body>
</html>