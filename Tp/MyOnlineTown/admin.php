<?php
$modifyN = false;
$modifyA = false;
$modifyI = false;
if (isset($_POST['titleA'], $_POST['imageA'], $_POST['contenA']) && $_POST['titleA'] && $_POST['imageA'] && $_POST['contenA']) {
    $titleA = htmlspecialchars($_POST['titleA']);
    $imageA = htmlspecialchars($_POST['imageA']);
    $contenA = htmlspecialchars($_POST['contenA']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO news VALUES ("", :titleA, :contenA, :imageA)');
    $req->bindParam(':titleA', $titleA, PDO::PARAM_STR);
    $req->bindParam(':contenA', $contenA, PDO::PARAM_STR);
    $req->bindParam(':imageA', $imageA, PDO::PARAM_STR);

    $req->execute();
} else if (isset($_POST['titleI'], $_POST['imageI'], $_POST['contenI']) && $_POST['titleI'] && $_POST['imageI'] && $_POST['contenI']) {
    $titleI = htmlspecialchars($_POST['titleI']);
    $imageI = htmlspecialchars($_POST['imageI']);
    $contenI = htmlspecialchars($_POST['contenI']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO moreinfos VALUES ("", :titleI, :contenI, :imageI)');
    $req->bindParam(':titleI', $titleI, PDO::PARAM_STR);
    $req->bindParam(':contenI', $contenI, PDO::PARAM_STR);
    $req->bindParam(':imageI', $imageI, PDO::PARAM_STR);

    $req->execute();
} else if (isset($_POST['titleE'], $_POST['dateE'], $_POST['contenE']) && $_POST['titleE'] && $_POST['dateE'] && $_POST['contenE']) {
    $titleE = htmlspecialchars($_POST['titleE']);
    $dateE = htmlspecialchars($_POST['dateE']);
    $contenE = htmlspecialchars($_POST['contenE']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('INSERT INTO activities VALUES ("", :dateE, :titleE, :contenE)');
    $req->bindParam(':dateE', $dateE, PDO::PARAM_STR);
    $req->bindParam(':titleE', $titleE, PDO::PARAM_STR);
    $req->bindParam(':contenE', $contenE, PDO::PARAM_STR);


    $req->execute();
} else if (isset($_GET['modifyAct'])) {

    $param = $_GET['modifyAct'];
    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, date, title, description FROM activities WHERE id = :id');
    $req->bindParam(':id', $param, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetch();

    $modifyA = true;
} else if (isset($_GET['modifyNews'])) {
    $param = $_GET['modifyNews'];
    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, title, content, image FROM news WHERE id = :id');
    $req->bindParam(':id', $param, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetch();

    $modifyN = true;
} else if (isset($_GET['modifyInfos'])) {
    $param = $_GET['modifyInfos'];

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('SELECT id, title, content, image FROM moreinfos WHERE id = :id');
    $req->bindParam(':id', $param, PDO::PARAM_INT);
    $req->execute();

    $result = $req->fetch();

    $modifyI = true;
} else if (isset($_POST['newsId']) && $_POST['modetitleA'] && $_POST['modeimageA'] && $_POST['modecontenA'] && $_POST['newsId']) {

    $id = $_POST['newsId'];
    $titleA = htmlspecialchars($_POST['modetitleA']);
    $imageA = htmlspecialchars($_POST['modeimageA']);
    $contenA = htmlspecialchars($_POST['modecontenA']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('UPDATE news SET title = :titleA, content = :contenA, image = :imageA WHERE ID = :id');
    $req->bindParam(':titleA', $titleA, PDO::PARAM_STR);
    $req->bindParam(':contenA', $contenA, PDO::PARAM_STR);
    $req->bindParam(':imageA', $imageA, PDO::PARAM_STR);
    $req->bindParam(':id', $id, PDO::PARAM_INT);

    $req->execute();
} else if (isset($_POST['actId'], $_POST['modedateE'], $_POST['modetitleE'], $_POST['modecontenE']) && $_POST['modedateE'] && $_POST['modetitleE'] && $_POST['modecontenE'] && $_POST['actId']) {
    $id = $_POST['actId'];
    $titleE = htmlspecialchars($_POST['modetitleE']);
    $dateE = htmlspecialchars($_POST['modedateE']);
    $contenE = htmlspecialchars($_POST['modecontenE']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('UPDATE activities SET date = :dateE, title = :titleE, description = :contenE WHERE ID = :id');
    $req->bindParam(':dateE', $dateE, PDO::PARAM_STR);
    $req->bindParam(':titleE', $titleE, PDO::PARAM_STR);
    $req->bindParam(':contenE', $contenE, PDO::PARAM_STR);
    $req->bindParam(':id', $id, PDO::PARAM_INT);

    $req->execute();
} else if (isset($_GET['supprimNews'])) {
    $param = $_GET['supprimNews'];

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('DELETE FROM news WHERE id = :id');
    $req->bindParam(':id', $param, PDO::PARAM_INT);
    $req->execute();

} else if (isset($_GET['supprimInfos'])) {
    $param = $_GET['supprimInfos'];

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('DELETE FROM moreinfos WHERE id = :id');
    $req->bindParam(':id', $param, PDO::PARAM_INT);
    $req->execute();

} else if (isset($_GET['supprimEvent'])) {
    $param = $_GET['supprimEvent'];

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('DELETE FROM activities WHERE id = :id');
    $req->bindParam(':id', $param, PDO::PARAM_INT);
    $req->execute();

} else if (isset($_POST['modetitleI'], $_POST['modeimageI'], $_POST['modecontenI'], $_POST['infosId']) && $_POST['modetitleI'] && $_POST['modeimageI'] && $_POST['modecontenI'] && $_POST['infosId']) {
    $param = $_POST['infosId'];
    $titleI = htmlspecialchars($_POST['modetitleI']);
    $imageI = htmlspecialchars($_POST['modeimageI']);
    $contenI = htmlspecialchars($_POST['modecontenI']);

    $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $bdd->prepare('UPDATE FROM moreinfos SET title = :titleI, content = :contenI, image = :imageI WHERE id = :id');
    $req->bindParam(':titleI', $titleI, PDO::PARAM_STR);
    $req->bindParam(':contenI', $contenI, PDO::PARAM_STR);
    $req->bindParam(':imageI', $imageI, PDO::PARAM_STR);
    $req->bindParam(':id', $param, PDO::PARAM_INT);

    $req->execute();
}
?>
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

        <br/>
        <?php
        if ($modifyA == false && $modifyN == false && $modifyI == false) {
            ?>
            <p class="buttons">
                <button id="addNew">Ajouter une actualitée</button>
                <button id="addInfo">Ajouter une information</button>
                <button id="addAct">Ajouter une activitée</button>
                <br/>
                <button id="modNew">Modifier une actualitée</button>
                <button id="modInfo">Modifier une information</button>
                <button id="modAct">Modifier une activitée</button>
            </p>
            <?php
        }
        ?>


        <?php
        if ($modifyA) {
            ?>
            <form method="post" action="admin.php" class="contact" id="actMod">
                <p>
                    <label for="modedateE">Date de l'activitée :</label>
                    <input type="date" name="modedateE" id="modedateE"
                           value="<?php echo date("Y-m-d", strtotime($result['date'])); ?>"/>

                    <br/>

                    <label for="modetitleE">Titre de l'activitée :</label>
                    <input type="text" name="modetitleE" id="modetitleE" value="<?php echo $result['title']; ?>"/>

                    <br/>

                    <label for="modecontenE">Description de l'activitée :</label>
                    <textarea name="modecontenE" id="modecontenE"><?php echo $result['description']; ?></textarea>

                    <br/>

                    <input type="submit" value="Enregistrer"/>

                </p>
            </form>
            <?php
        } else if ($modifyN) {
            ?>
            <form method="post" action="admin.php" class="contact" id="newMod">
                <p>
                    <label for="modetitleA">Titre de l'actualité :</label>
                    <input type="text" name="modetitleA" id="modetitleA" value="<?php echo $result['title']; ?>"/>

                    <br/>

                    <label for="modeimageA">Url de l'image de l'actualité :</label>
                    <input type="text" name="modeimageA" id="modeimageA" value="<?php echo $result['image']; ?>"/>

                    <br/>

                    <label for="modecontenA">Contenue de l'actualité :</label>
                    <textarea name="modecontenA" id="modecontenA"><?php echo $result['content']; ?></textarea>

                    <br/>
                    <input type="hidden" id="newsId" value="<?php echo $_GET['modifyNews']; ?>"/>
                    <input type="submit" value="Enregistrer"/>

                </p>
            </form>
            <?php
        } else if ($modifyI) {
            ?>
            <form method="post" action="admin.php" class="contact" id="infoMod">
                <p>
                    <label for="modetitleI">Titre de l'information :</label>
                    <input type="text" name="modetitleI" id="modetitleI" value="<?php echo $result['title']; ?>"/>

                    <br/>

                    <label for="modeimageI">Url de l'image de l'information :</label>
                    <input type="text" name="modeimageI" id="modeimageI" value="<?php echo $result['image']; ?>"/>

                    <br/>

                    <label for="modecontenI">Contenue de l'information :</label>
                    <textarea name="modecontenI" id="modecontenI"><?php echo $result['content']; ?></textarea>

                    <br/>
                    <input type="hidden" id="infosId" value="<?php echo $_GET['modifyInfos']; ?>"/>
                    <input type="submit" value="Enregistrer"/>

                </p>
            </form>
            <?php
        }
        ?>

        <form method="post" action="admin.php" class="contact" id="newForm">
            <p>
                <label for="titleA">Titre de l'actualité :</label>
                <input type="text" name="titleA" id="titleA"/>

                <br/>

                <label for="imageA">Url de l'image de l'actualité :</label>
                <input type="text" name="imageA" id="imageA"/>

                <br/>

                <label for="contenA">Contenue de l'actualité :</label>
                <textarea name="contenA" id="contenA"></textarea>

                <br/>

                <input type="submit" id="newsA" value="Enregistrer"/>

            </p>
        </form>

        <form method="post" action="admin.php" class="contact" id="infoForm">
            <p>
                <label for="titleI">Titre de l'information :</label>
                <input type="text" name="titleI" id="titleI"/>

                <br/>

                <label for="imageI">Url de l'image de l'information :</label>
                <input type="text" name="imageI" id="imageI"/>

                <br/>

                <label for="contenI">Contenue de l'information :</label>
                <textarea name="contenI" id="contenI"></textarea>

                <br/>

                <input type="submit" id="newsI" value="Enregistrer"/>

            </p>
        </form>

        <form method="post" action="admin.php" class="contact" id="actForm">
            <p>
                <label for="dateE">Date de l'activitée :</label>
                <input type="date" name="dateE" id="dateE"/>

                <br/>

                <label for="titleE">Titre de l'activitée :</label>
                <input type="text" name="titleE" id="titleE"/>

                <br/>

                <label for="contenE">Description de l'activitée :</label>
                <textarea name="contenE" id="contenE"></textarea>

                <br/>

                <input type="submit" id="newsE" value="Enregistrer"/>

            </p>
        </form>

        <table class="activities" id="newsList">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $bdd->prepare('SELECT id, title, content, image FROM news');
            $req->execute();

            $result = $req->fetchAll();

            foreach ($result as $news) {
                ?>
                <tr>
                    <td data-thead="Titre :"><?php echo $news['title']; ?></td>
                    <td data-thead="Contenu :"><?php echo $news['content']; ?></td>
                    <td data-thead="Image :"><?php echo $news['image']; ?></td>
                    <td><a href="<?php echo 'admin.php?modifyNews=' . $news['id']; ?>">Modifier</a><a
                            href="<?php echo 'admin.php?supprimNews=' . $news['id']; ?>"> / Suppimer</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <table class="activities" id="infosList">
            <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Image</th>
            </tr>
            </thead>

            <tbody>
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=myonlinetown;charset=utf8', 'root', '');

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $req = $bdd->prepare('SELECT id, title, content, image FROM moreinfos');
            $req->execute();

            $result = $req->fetchAll();

            foreach ($result as $news) {
                ?>
                <tr>
                    <td data-thead="Titre :"><?php echo $news['title']; ?></td>
                    <td data-thead="Contenu :"><?php echo $news['content']; ?></td>
                    <td data-thead="Image :"><?php echo $news['image']; ?></td>
                    <td><a href="<?php echo 'admin.php?modifyInfos=' . $news['id']; ?>">Modifier</a><a
                            href="<?php echo 'admin.php?supprimInfos=' . $news['id']; ?>"> / Suppimer</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

        <table class="activities" id="actList">
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
                    <td><a href="<?php echo 'admin.php?modifyAct=' . $news['id']; ?>">Modifier</a><a
                            href="<?php echo 'admin.php?supprimEvent=' . $news['id']; ?>"> / Suppimer</a></td>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="main.js"></script>
</body>
</html>