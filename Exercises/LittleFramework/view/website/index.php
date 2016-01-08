<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Little Framework</title>
    </head>

    <body>
        <h1>Welcome on my first little framework</h1>
        <h2>On this page we found all the news : </h2>

        <?php
        foreach($news as $new) {
            ?>
            <div class="news">
                <h3>
                    <?php echo $new['title']; ?>
                    <br />
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
    </body>
</html>