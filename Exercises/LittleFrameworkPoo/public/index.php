<?php
require dirname(__DIR__) . '/model/NewsModel.php';
require dirname(__DIR__) . '/controller/DbController.php';
require dirname(__DIR__) . '/controller/NewsController.php';
require dirname(__DIR__) . '/controller/RouterController.php';

use Controller\RouterController;

$router = new RouterController();

$uri = str_replace("/MentoratOC/Exercises/LittleFrameworkPoo/public/", "/", $_SERVER['REQUEST_URI']);

$router->route($uri);


