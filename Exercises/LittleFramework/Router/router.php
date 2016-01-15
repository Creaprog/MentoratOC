<?php
require_once ROOT . '/router/routes.php';

function run($url)
{
    $route = trim($url, '/');
    $routes = getRoutes();
    foreach ($routes as $valid) {
        if ($valid === $route) {
            $path = ROOT . '/controller/website/' . $route . '.php';
            if (file_exists($path)) {
                include_once ROOT . '/controller/website/' . $route . '.php';
            }
        }
    }
}