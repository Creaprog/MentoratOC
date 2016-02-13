<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="../css/styles.css"/>
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
            <button id="addNew">Ajouter une new</button>
            <button id="addInfo">Ajouter une information</button>
            <button id="addAct">Ajouter une activitée</button>
        </p>

        <div id="dataLog">

        </div>
    </section>

    <footer>
        <a href="../login.php">Administration</a>
    </footer>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
