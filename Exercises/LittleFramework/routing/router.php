<?php
require_once ROOT . '/routing/routes.php';

function run($url)
{
    $routes = getRoutes();
    foreach ($routes as $valid) {
        if ($valid === $url) {
            $path = ROOT . '/controller/website/' . $routes[$valid] . '.php';
            if (file_exists($path)) {
                include_once ROOT . '/controller/website/' . $routes[$valid] . '.php';
            }
        }
    }
}