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
    <!-- <link rel="stylesheet" href="css/styles.css"/> -->
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

    <div class="container theme-showcase" role="main" style="margin-top: 50px;">
        <div class="jumbotron text-center">
            <h1 id="last_new_text"><?php echo $news['title']; ?></h1>
            <p><a href="<?php echo 'news.php?id=' . $news['id']; ?>"><img class="img-responsive"
                                                                          src="<?php echo $news['image']; ?>"
                                                                          alt="last_new" style="margin: 0 auto;"></a>
            </p>

        </div>
        <div class="page-header">
            <h1>Quisque tristique posuere massa egetcs</h1>
            <img src="images/index/home.jpg" alt="home" class="col-md-4 col-sm-4 img-responsive">

            <p class="col-md-8 col-sm-8">
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
        </div>


        <div class="text-center">
            <?php include('footer.php'); ?>
        </div>


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