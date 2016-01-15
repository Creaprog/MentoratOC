<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Little Framework</title>
</head>

<body>
<h1>Welcome on my first little framework</h1>
<h2>On this page we found all the news : </h2>

<?php
foreach ($news as $new) {
    ?>
    <div class="news">
        <h3>
            <?php echo $new['title']; ?>
            <br/>
            <em>Le <?php echo $new['date_fr']; ?></em>
        </h3>

        <p>
            <?php echo $new['text']; ?>
            <br/>
        <h4>Par <?php echo $new['author']; ?></h4>
        </p>
    </div>
    <?php
}
?>

<form action="index" method="post">
    <p>
        <label for="title">Title :</label>
        <input type="text" name="title" id="title"/>
        <br/>
        <label for="text">Text :</label>
        <input type="text" name="text" id="text"/>
        <br/>
        <label for="author">Author :</label>
        <input type="text" name="author" id="author"/>
        <br/>
        <input type="submit" value="Send"/>
    </p>
</form>
</body>
</html>