<?php
include_once "model/website/get_news.php";
if(isset($_POST['title'], $_POST['text'], $_POST['author']) && $_POST['title'] && $_POST['text'] && $_POST['author'])
{
    include_once "model/website/add_new.php";

    $title = htmlspecialchars($_POST['title']);
    $text = htmlspecialchars($_POST['text']);
    $author = htmlspecialchars($_POST['author']);

    add_new($title, $text, $author);

}
$news = get_news(0, 5);

foreach ($news as $key => $new) {
    $news[$key]['title'] = htmlspecialchars($new['title']);
    $news[$key]['text'] = htmlspecialchars($new['text']);
    $news[$key]['author'] = htmlspecialchars($new['author']);
}

include_once "view/website/index.php";