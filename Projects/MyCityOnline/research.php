<?php
session_start();
if (isset($_GET['r']) && $_GET['r']) {
    $element = htmlspecialchars($_GET['r']);
    require_once 'functions/get_research.php';
    $results = get_research($element);
    //var_dump($results);
} else {
    header('Location: index.php');
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

    <section>
        <table class="activities">
            <thead>
            <tr>
                <th>Image</th>
                <th>Titre</th>
                <th>Debut du contenu</th>
                <th>Type</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($results as $result) {
                foreach ($result as $item) {
                    ?>
                    <tr>
                        <td data-thead="Image :"><?php echo '<img src="' . $item['image'] . '" alt="' . $item['id'] . '"class="req"'; ?></td>
                        <td data-thead="Titre :"><?php echo $item['title']; ?></td>
                        <td data-thead="Debut du contenu :"><?php
                            if (strlen($item['content']) >= 100) {
                                $item['content'] = substr($item['content'], 0, 100);
                                $space = strrpos($item['content'], ' ');
                                $item['content'] = substr($item['content'], 0, $space) . ' ... ';
                            }
                            echo $item['content'];
                            ?></td>
                        <td data-thead="Type :"><?php echo $item['Type'] ?></td>
                        <td><a href="<?php
                            if ($item['Type'] == 'new') {
                                echo 'news.php?id=' . $item['id'];
                            } elseif ($item['Type'] == 'information') {
                                echo 'infos.php?id=' . $item['id'];
                            } else {
                                echo '#';
                            }
                            ?>">Voir</a></td>
                    </tr>
                    <?php
                }
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
</body>
</html>