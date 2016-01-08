<?php
include_once "model/website/get_news.php";
$news = get_news(0, 5);

foreach ($news as $key => $new) {
    $news[$key]['title'] = htmlspecialchars($new['title']);
    $news[$key]['text'] = htmlspecialchars($new['text']);
    $news[$key]['author'] = htmlspecialchars($new['author']);
}

include_once "view/website/index.php";