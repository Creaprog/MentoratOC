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

    <section id="infos">
        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $req = $bdd->prepare('SELECT id, title, content, image FROM moreinfos');
        $req->execute();

        $result = $req->fetchAll();



        foreach ($result as $news) {
        ?>
            <article>
                <img src="<?php echo $news['image']; ?>" alt="news<?php echo $news['id']; ?>">

                <h1><?php echo $news['title']; ?></h1>

                <p><?php echo $news['content']; ?></p>
            </article>
            <?php
        }
        ?>

    </section>

    <footer>
        <a href="#">Administration</a>
    </footer>

</div>
</body>
</html>