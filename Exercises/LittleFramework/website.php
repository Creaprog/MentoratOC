<?php
const ROOT = __DIR__;
include_once ROOT . '/config/db.php';
if (!isset($_GET['section']) || $_GET['section'] == 'index') {
    include_once ROOT . '/controller/website/index.php';
}