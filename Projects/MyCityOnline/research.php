<?php
session_start();
if (isset($_GET['r']) && $_GET['r']) {
    $element = htmlspecialchars($_GET['r']);
    require_once 'functions/get_research.php';
    $results = get_research($element);
} else {
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <!--<link rel="stylesheet" href="css/styles.css"/>-->
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

<div class="container" role="main" style="margin-top: 100px;">
    <section>
        <div class="table-responsive">


            <table class="activities table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Titre</th>
                    <th>Debut du contenu</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($results as $result) {
                    foreach ($result as $item) {
                        ?>
                        <tr>
                            <td data-thead="Image :"><?php echo '<img src="' . $item['image'] . '" alt="' . $item['id'] . '"class="req img-responsive"'; ?></td>
                            <td data-thead="Titre :"><h4><?php echo $item['title']; ?></h4></td>
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
                                ?>" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span> Voir</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
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