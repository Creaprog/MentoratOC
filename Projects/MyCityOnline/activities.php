<?php
session_start();
require_once 'functions/get_all_activities.php';
$activities = get_all_activities();
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
        <table class="activities">
            <thead>
            <tr>
                <th>Date</th>
                <th>Titre</th>
                <th>Description</th>
            </tr>
            </thead>

            <tbody>
            <?php


            foreach ($activities as $activity) {
                ?>
                <tr>
                    <td data-thead="Date :"><?php echo date("d/m/Y", strtotime($activity['instant'])); ?></td>
                    <td data-thead="Titre :"><?php echo $activity['title']; ?></td>
                    <td data-thead="Description :"><?php echo $activity['description']; ?></td>
                    <td><a href="#">Inscription</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </section>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

</div>
</body>
</html>