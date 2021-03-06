<?php
session_start();
$getNew = false;
if (isset($_GET['id'])) {
    $nbrPage = 0;
    $id = $_GET['id'];
    if (is_numeric($id)) {
        $id = (int)$id;
        if (is_int($id) && $id > 0) {
            $getNew = true;
            require_once 'functions/get_new.php';
            $news = get_new($id);
        }
    } else {
        header('Location: news.php');
    }
} elseif (isset($_GET['page'])) {
    $pageId = $_GET['page'];
    if (is_numeric($pageId)) {
        $pageId = (int)$pageId;
        if (is_int($pageId) && $pageId > 0) {
            require_once 'functions/get_all_news.php';
            $elementslenght = get_all_news();
            $elementslenght = count($elementslenght);
            $elements = (int)$elementslenght;

            $nbrPage = ceil($elements / 5);
            $actualPage = $pageId;
            if ($actualPage > $nbrPage) {
                $actualPage = $nbrPage;
            }
            $firstEntry = ($actualPage - 1) * 5;
            require_once 'functions/get_news.php';
            $news = get_news($firstEntry, 5);
        }
    } else {
        header('Location: news.php');
    }
} else {
    require_once 'functions/get_all_news.php';
    $elementslenght = get_all_news();
    $elementslenght = count($elementslenght);
    $elements = (int)$elementslenght;

    $nbrPage = ceil($elements / 5);

    $actualPage = 1;
    $firstEntry = ($actualPage - 1) * 5;
    require_once 'functions/get_news.php';
    $news = get_news($firstEntry, 5);
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
<div id="block_body">
    <?php include('header.php'); ?>

    <div class="container" style="margin-top: 100px;">
        <?php
        foreach ($news as $new) {
            ?>

            <article class="container" style="margin-top: 50px;">
                <div class="jumbotron text-center">


                    <img src="<?php echo $new['image']; ?>" alt="news<?php echo $new['id']; ?>"
                         class="img-responsive col-md-4">


                    <h1><?php echo $new['title']; ?></h1>

                    <p>
                        <?php
                        if (!$getNew) {
                            if (strlen($new['content']) >= 200) {
                                $new['content'] = substr($new['content'], 0, 200);
                                $space = strrpos($new['content'], ' ');
                                $new['content'] = substr($new['content'], 0, $space) . ' ... <a href=news.php?id=' . $new['id'] . ' class="link">lire la suite</a>';
                            }
                            echo $new['content'];
                        } else {
                            echo $new['content'];
                        }
                        ?></p>

                </div>
            </article>
            <?php
        }
        ?>
        <p class="text-center" style="margin-top: 50px;">
            <?php
            for ($i = 1; $i <= $nbrPage; $i++) {
                echo '<a href=news.php?page=' . $i . '> Page ' . $i . '</a> / ';
            }
            ?>
        </p>
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