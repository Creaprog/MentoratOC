<?php

namespace Controller;


class DbController
{
    private $settings = [];

    public function __construct()
    {
        $this->settings = require dirname(__DIR__) . '/config/db.php';
    }

    public function get($key)
    {
        if(!isset($this->settings[$key])){
            return null;
        }

        return $this->settings[$key];
    }
}