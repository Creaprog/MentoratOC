<?php
const ROOT = __DIR__;
include_once ROOT . '/config/db.php';
include_once ROOT . '/routing/router.php';
run($_GET['url']);