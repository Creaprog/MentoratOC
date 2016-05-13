<h1>Voici toutes les news : </h1>

<?php foreach ($news as $new): ?>
    <h2><a href='index.php?action=new&id=<?= $new->id; ?>'><?= $new->title; ?></a></h2>
    <em><?= $new->author; ?> , <?= $new->creation; ?></em>
    <p><?= $new->text; ?></p>
<?php endforeach; ?>