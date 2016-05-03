<?php
session_start();
require_once 'functions/get_all_activities.php';
$activities = get_all_activities();
if (isset($_POST['name'], $_POST['event']) && $_POST['name'] && $_POST['event']) {
    $event = htmlspecialchars($_POST['event']);
    $name = htmlspecialchars($_POST['name']);
    require_once 'functions/send_mail.php';

    $information = '<h3>' . $name . ' s\'inscrit a  ' . $event . '</h3>';
    try {
        send_mail(NULL, $name, $information, ' , nouvelle inscription');
    } catch (Exception $e) {
        $error = '<p class="text-center contact alert alert-danger">' . $e . '</p>';
    }
    $reply = "<p class='text-center contact alert alert-success'>Inscription validée.</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <!--<link rel="stylesheet" href="css/styles.css"/> -->
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
        <section>
            <?php if (empty($reply)) { ?>
                <div class="table-responsive">
                    <table class="activities table table-hover">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Titre</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        <?php


                        foreach ($activities as $activity) {
                            ?>
                            <tr>
                                <td data-thead="Date :"><?php echo date("d/m/Y", strtotime($activity['instant'])); ?></td>
                                <td data-thead="Titre :"><?php echo $activity['title']; ?></td>
                                <td data-thead="Description :"><?php echo $activity['description']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#modalId_<?php echo $activity['id']; ?>">
                                        Inscription
                                    </button>
                                </td>
                                <div class="modal fade" tabindex="-1" role="dialog"
                                     id="modalId_<?php echo $activity['id']; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title"><?php echo $activity['title']; ?></h4>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Description :</h2>
                                                <p><?php echo $activity['description']; ?></p>
                                                <hr>
                                                <form method="post" action="activities.php">
                                                    <div class="form-group">
                                                        <label for="name_<?php echo $activity['id']; ?>">Votre nom
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                               id="name_<?php echo $activity['id']; ?>" name="name"
                                                               placeholder="john" required>
                                                        <input type="hidden" name="event"
                                                               value="<?php echo $activity['title']; ?>">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">S'inscrire</button>
                                                </form>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </tr>


                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            <?php } else {
                echo $reply;
                if (isset($error)) {
                    echo $error;
                }
            } ?>
        </section>
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
