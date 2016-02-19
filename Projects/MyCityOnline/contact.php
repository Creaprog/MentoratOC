<?php
session_start();
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
        <form method="post" action="" class="contact">
            <p>
                <label for="title">Titre du message :</label>
                <input type="text" name="title" id="title"/>

                <br/>

                <label for="name">Votre nom :</label>
                <input type="text" name="name" id="name"/>

                <br/>

                <label for="born">Votre date de naissance :</label>
                <input type="date" name="born" id="born"/>

                <br/>

                <label for="email">Votre e-mail :</label>
                <input type="email" name="email" id="email"/>

                <br/>

                <input type="checkbox" name="citizen" id="citizen"/>
                <label for="citizen">Résident de la ville</label>

                <br/>

                <label for="nationality">Nationalité</label>
                <select name="nationality" id="nationality">
                    <option value="Fraçaise">Française</option>
                    <option value="Marocaine">Marocaine</option>
                    <option value="Algérienne">Algérienne</option>
                    <option value="Américaine">Américaine</option>
                    <option value="Anglaise">Anglaise</option>
                    <option value="Allemande">Allemande</option>
                </select>

                <br/>

                <label for="message">Message</label>
            <textarea name="message" id="message" rows="10" cols="40">

            </textarea>
            </p>
        </form>
    </section>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/research.js"></script>
</body>
</html>