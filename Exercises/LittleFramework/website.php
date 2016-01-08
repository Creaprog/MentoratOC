<?php
include_once "model/website/db.php";
if (!isset($_GET['section']) OR $_GET['section'] == 'index') {
    include_once('controller/website/index.php');
}