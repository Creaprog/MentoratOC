<?php
require_once 'functions/get_all_infos.php';
$informations = get_all_infos();
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

    <section id="infos">
        <?php
        foreach ($informations as $information) {
            ?>
            <article>
                <img src="<?php echo $information['image']; ?>" alt="news<?php echo $information['id']; ?>">

                <h1><?php echo $information['title']; ?></h1>

                <p><?php echo $information['content']; ?></p>
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