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
        case "modNew":
            if (isset($_POST['id']) && $_POST['id']) {
                $id = htmlspecialchars($_POST['id']);
                require_once 'ajax_update_new.php';
                try {
                    ajax_update_new($id, $title, $image, $content);
                    $result = 'requestOk';
                } catch (Exception $e) {
                    $result = $e;
                }
                echo $result;
                break;
            }
            break;
        case "modInfo":
            if (isset($_POST['id']) && $_POST['id']) {
                $id = htmlspecialchars($_POST['id']);
                require_once 'ajax_update_info.php';
                try {
                    ajax_update_info($id, $title, $image, $content);
                    $result = 'requestOk';
                } catch (Exception $e) {
                    $result = $e;
                }
                echo $result;
                break;
            }
            break;
        case "modAct":
            if (isset($_POST['id']) && $_POST['id']) {
                $id = htmlspecialchars($_POST['id']);
                require_once 'ajax_update_activitie.php';
                try {
                    ajax_update_activitie($id, $title, $image, $content);
                    $result = 'requestOk';
                } catch (Exception $e) {
                    $result = $e;
                }
                echo $result;
                break;
            }
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
} elseif (isset($_POST['modElement'], $_POST['idElement']) && $_POST['modElement'] && $_POST['idElement']) {
    $element = htmlspecialchars($_POST['modElement']);
    $id = htmlspecialchars($_POST['idElement']);

    switch ($element) {
        case "new":
            require_once 'ajax_get_new.php';
            try {
                $result = json_encode(ajax_get_new($id));
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
        case "information":
            require_once 'ajax_get_info.php';
            try {
                $result = json_encode(ajax_get_info($id));
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
        case "activitie":
            require_once 'ajax_get_activitie.php';
            try {
                $result = json_encode(ajax_get_activitie($id));
            } catch (Exception $e) {
                $result = $e;
            }
            echo $result;
            break;
    }
}