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
                    <td><a href="#" data-width="200" data-rel="popup_registration_<?php echo $activity['id']; ?>"
                           class="popup_link">Inscription</a></td>
                    <div id="popup_registration_<?php echo $activity['id']; ?>" class="popup">
                        <h2>Inscription pour <?php echo $activity['title']; ?></h2>
                        <p>Affin de vous inscrire a cet evenement merci d'indique votre nom :</p>
                        <label for="name">Votre nom :</label>
                        <input type="text" id="name"/>
                        <br/>
                        <button class="valid_registration">S'inscrire</button>
                    </div>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/research.js"></script>
<script src="js/registration.js"></script>
</body>
</html>