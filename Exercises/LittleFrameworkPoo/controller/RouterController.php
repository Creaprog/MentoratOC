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
        foreach ($this->routes as $key => $route) {
            if ($uri === '/' && $key === '/') {
                call_user_func(__NAMESPACE__ . '\\' . $route);
                break;
            } elseif ($key !== '/') {
                if (preg_match('/' . str_replace('/', '\/', $key) . '/', $uri, $params)) {
                    unset($params[0]);
                    call_user_func(__NAMESPACE__ . '\\' . $route, $params);
                    break;
                }
            }
        }
    }
}