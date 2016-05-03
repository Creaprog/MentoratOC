<?php
session_start();
if (isset($_POST['title'], $_POST['name'], $_POST['born'], $_POST['email'], $_POST['nationality'], $_POST['message']) && $_POST['title'] && $_POST['name'] && $_POST['born'] && $_POST['email'] && $_POST['nationality'] && $_POST['message']) {
    $title = htmlspecialchars($_POST['title']);
    $name = htmlspecialchars($_POST['name']);
    $born = htmlspecialchars($_POST['born']);
    $email = htmlspecialchars($_POST['email']);
    $nationality = htmlspecialchars($_POST['nationality']);
    require_once 'functions/send_mail.php';
    if (isset($_POST['citizen'])) {
        $citizen = 'Oui';
    } else {
        $citizen = 'Non';
    }
    $message = htmlspecialchars($_POST['message']);

    $information = '<h3>Vous avez reçu un message de ' . $name . '</h3>
                  <h4>' . $title . '</h4>
                  <p>' . $message . '</p>
                  <h5>Voici ses informations :</h5>
                  <p>Nom : ' . $name . '</p>
                  <p>Née le : ' . $born . '</p>
                  <p>Email : ' . $email . '</p>
                  <p>Nationalité : ' . $nationality . '</p>
                  <p>Est citoyen de la ville : ' . $citizen . '</p>';
    try {
        send_mail($email, $name, $information, ' , demande de contact');
    } catch (Exception $e) {
        $error = '<p class="text-center contact alert alert-danger">' . $e . '</p>';
    }
    $reply = "<p class='text-center contact alert alert-success'>Votre message a bien été transmis. Nous vous répondrons le plus vite possible.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <!--<link rel="stylesheet" href="css/styles.css"/> -->
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <body class="ie7">
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <title>My City Online</title>
</head>
<body>
<div id="block_body">
    <?php include('header.php'); ?>
    <div class="container theme-showcase" role="main" style="margin-top: 100px;">
        <section>
            <h1 class="text-center">Nous contacter :</h1>
            <br>
            <?php if (empty($reply)) { ?>
                <form method="post" action="contact.php" class="contact">
                    <div class="form-group">
                        <label for="title">Titre du message :</label>
                        <input type="text" name="title" id="title" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="name">Votre nom :</label>
                        <input type="text" name="name" id="name" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="born">Votre date de naissance :</label>
                        <input type="date" name="born" id="born" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <label for="email">Votre e-mail :</label>
                        <input type="email" name="email" id="email" class="form-control" required/>
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="citizen" id="citizen"/>
                        <label for="citizen">Résident de la ville</label>
                    </div>

                    <div class="form-group">
                        <label for="nationality">Nationalité :</label>
                        <select name="nationality" id="nationality" class="form-control">
                            <option value="Fraçaise">Française</option>
                            <option value="Marocaine">Marocaine</option>
                            <option value="Algérienne">Algérienne</option>
                            <option value="Américaine">Américaine</option>
                            <option value="Anglaise">Anglaise</option>
                            <option value="Allemande">Allemande</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message :</label>
                        <textarea name="message" id="message" rows="10" cols="40" class="form-control"
                                  required></textarea>
                    </div>
                    <button class="btn btn-primary"><span class="glyphicon glyphicon-send"></span> Envoyer</button>
                </form>
            <?php } else {
                echo $reply;
                if (isset($error)) {
                    echo $error;
                }
            } ?>
        </section>
    </div>
    <div class="text-center">
        <?php include('footer.php'); ?>
    </div>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/research.js"></script>
</body>
</html>