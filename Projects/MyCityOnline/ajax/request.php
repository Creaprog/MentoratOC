<?php
if (isset($_POST['title'], $_POST['image'], $_POST['content'], $_POST['type']) && $_POST['title'] && $_POST['image'] && $_POST['content'] && $_POST['type']) {
    $title = htmlspecialchars($_POST['title']);
    $image = htmlspecialchars($_POST['image']);
    $content = htmlspecialchars($_POST['content']);
    $type = htmlspecialchars($_POST['type']);

    switch ($type) {
        case "addNew":
            require_once '../functions/add_new.php';
            try {
                add_new($title, $image, $content);
                $result = 'requestOk';
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
        case "addInfo":
            require_once '../functions/add_info.php';
            try {
                add_info($title, $image, $content);
                $result = 'requestOk';
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
        case "addAct":
            require_once '../functions/add_activitie.php';
            try {
                add_activitie($title, $image, $content);
                $result = 'requestOk';
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
    }
} elseif (isset($_POST['getElement']) && $_POST['getElement']) {
    $element = htmlspecialchars($_POST['getElement']);

    switch ($element) {
        case "news":
            require_once 'ajax_all_news.php';
            try {
                $result = json_encode(ajax_all_news());

            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
        case "informations":
            require_once 'ajax_all_infos.php';
            try {
                $result = json_encode(ajax_all_infos());
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
        case "activities":
            require_once 'ajax_all_activities.php';
            try {
                $result = json_encode(ajax_all_activities());
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
    }
}