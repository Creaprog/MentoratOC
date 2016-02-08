<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="style.css"/>
    <!--[if lte IE 8]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lte IE 7]>
    <body class="ie7">
    <![endif]-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <title>Panda - Ville</title>
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
            $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $bdd->prepare('SELECT id, date, title, description FROM activities');
            $req->execute();

            $result = $req->fetchAll();

            foreach ($result as $news) {
                ?>
                <tr>
                    <td data-thead="Date :"><?php echo date("d/m/Y", strtotime($news['date'])); ?></td>
                    <td data-thead="Titre :"><?php echo $news['title']; ?></td>
                    <td data-thead="Description :"><?php echo $news['description']; ?></td>
                    <td><a href="#">Inscription</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </section>

    <footer>
        <a href="#">Administration</a>
    </footer>

</div>
</body>
</html>