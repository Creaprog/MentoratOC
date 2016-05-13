<?php

namespace Controller;

use Model\NewsModel;

class NewsController
{
    private static $news;

    public function __construct()
    {
        $newsModel = new NewsModel();
        self::$news = $newsModel;
    }


    public static function index()
    {

        $news = self::$news->showNews();
        self::render('home', compact('news'));
    }

    public static function show($id)
    {
        $new = self::$news->show($id);
        self::render('new', compact('new'));
    }

    private function render($view, $variables = [])
    {
        ob_start();
        extract($variables);
        require dirname(__DIR__) . '/view/' . $view . '.php';
        $content = ob_get_clean();
        require dirname(__DIR__) . '/template/layout.php';
    }
}