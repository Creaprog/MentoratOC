<?php
require_once ROOT . '/routing/routes.php';

function run($url)
{
    $routes = getRoutes();
    foreach ($routes as $key => $controller) {
        if ($key === $url) {
            $path = ROOT . '/controller/website/' . $controller . '.php';
            if (file_exists($path)) {
                include_once ROOT . '/controller/website/' . $controller . '.php';
            }
        }
    }
}