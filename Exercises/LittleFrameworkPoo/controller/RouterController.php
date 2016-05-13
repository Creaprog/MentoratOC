<?php

namespace Controller;

use Controller\NewsController;

class RouterController
{
    private $routes = [];
    private $newController;

    public function __construct()
    {
        $this->routes = require dirname(__DIR__) . '/config/routes.php';
        $this->newController = new NewsController();
    }

    public function showRoutes()
    {
        return $this->routes;
    }

    public function route($uri)
    {

        // Ici ma logique est la suivante, je parcours toutes mes routes, et pour chaque route j'execute une regex pour voir si l'uri match avec une des key d'une route, si elle match alors
        // On l'execute et si dans la key on a une regex avec le match precedant on retrouve sa valeur
        // Sauf que deja la premiere route va matcher tout les temps (/, /test, /toto) et ensuite je peux pas recuperer la regex de la routes du coup je suis bloquer

        foreach ($this->routes as $key => $route) {
            $regex = str_replace('/', '\/', $key);

            if (preg_match('/' . $regex . '/', $uri, $matched)) {
                //$action = explode("::", $route);
                //call_user_func(__NAMESPACE__. '\\' . $route);
                // NewsController::index();
                echo 'ok';
                break;
            } else {
                echo 'not';
            }

        }
    }
}