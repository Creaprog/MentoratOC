<?php
require_once ROOT . '/routing/routes.php';

function run($module, $action)
{
    $routes = getRoutes();
    foreach ($routes as $key => $controller) {
        if ($key === $module) {
            $path = ROOT . '/controller/website/' . $controller . '.php';
            if (file_exists($path)) {
                if(isset($action)&& $_GET['action']){
                    $req = $action;
                }
                include_once ROOT . '/controller/website/' . $controller . '.php';
            }
        }
    }
}