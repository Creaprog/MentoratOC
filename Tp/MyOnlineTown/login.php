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
    <nav>
        <ul>
            <li><a href="index.html">Accueil</a></li>
            <li><a href="news.html">Actualités</a></li>
            <li><a href="infos.html">Plus d'infos</a></li>
            <li><a href="activities.html">Activités du mois</a></li>
            <li>Recherche</li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>

    <header>
        <img src="pictures/town.png" alt="logo_town">

        <h1>Panda - Ville</h1>

        <h2>Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..</h2>
    </header>

    <section>
        <form method="post" action="request.php" id="login">
            <p>
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo"/>

                <br/>

                <label for="password">Password :</label>
                <input type="password" name="password" id="password"/>

                <br/>

                <input type="submit" value="Login" />
            </p>
        </form>
    </section>

    <footer>
        <a href="#">Administration</a>
    </footer>

</div>
</body>
</html>