<?php
session_start();
$getInfo = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $id = (int)$id;
        if (is_int($id) && $id > 0) {
            $getInfo = true;
            require_once 'functions/get_info.php';
            $informations = get_info($id);
        }
    } else {
        header('Location: infos.php');
    }
} else {
    require_once 'functions/get_all_infos.php';
    $informations = get_all_infos();
}
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

<?php include('header.php'); ?>

<div class="container" style="margin-top: 50px;">
    <?php
    foreach ($informations as $information) {
        ?>
        <article class="container">
            <div class="jumbotron text-center">
                <img src="<?php echo $information['image']; ?>" alt="news<?php echo $information['id']; ?>"
                     class="img-responsive" style="margin: 0 auto;">


                <h1><?php echo $information['title']; ?></h1>

                <p><?php
                    if (!$getInfo) {
                        if (strlen($information['content']) >= 200) {
                            $information['content'] = substr($information['content'], 0, 200);
                            $space = strrpos($information['content'], ' ');
                            $information['content'] = substr($information['content'], 0, $space) . ' ... <a href=infos.php?id=' . $information['id'] . ' class="link">lire la suite</a>';
                        }
                        echo $information['content'];
                    } else {
                        echo $information['content'];
                    }
                    ?></p></div>
        </article>
        <?php
    }
    ?>
</div>

<div class="text-center">
    <?php include('footer.php'); ?>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/research.js"></script>
</body>
</html>