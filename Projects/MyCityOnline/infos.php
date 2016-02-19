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
                    ?></p>
            </article>
            <?php
        }
        ?>

    </section>

    <footer>
        <?php include('footer.php'); ?>
    </footer>

</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="js/research.js"></script>
</body>
</html>