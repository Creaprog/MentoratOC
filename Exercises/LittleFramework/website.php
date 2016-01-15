<?php
const ROOT = __DIR__;
include_once ROOT . '/config/db.php';
include_once ROOT . '/router/router.php';
run($_GET['url']);