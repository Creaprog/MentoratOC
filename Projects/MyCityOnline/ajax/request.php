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
}