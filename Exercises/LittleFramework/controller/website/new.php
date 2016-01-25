<?php
require_once ROOT . '/functions/load_model.php';
require_once ROOT . '/functions/load_view.php';

if (isset($req) && is_numeric($req)) {
    load_model('get_new');
    $news = get_new($req);
} else {
    load_model('get_news');
    if (isset($_POST['title'], $_POST['text'], $_POST['author']) && $_POST['title'] && $_POST['text'] && $_POST['author']) {
        load_model('add_new');

        $title = htmlspecialchars($_POST['title']);
        $text = htmlspecialchars($_POST['text']);
        $author = htmlspecialchars($_POST['author']);

        add_new($title, $text, $author);

    }
    $news = get_news(0, 5);
}
foreach ($news as $key => $new) {
    $news[$key]['title'] = htmlspecialchars($new['title']);
    $news[$key]['text'] = htmlspecialchars($new['text']);
    $news[$key]['author'] = htmlspecialchars($new['author']);

}

$parameters = ['news' => $news];

load_view('new', 'website', $parameters);