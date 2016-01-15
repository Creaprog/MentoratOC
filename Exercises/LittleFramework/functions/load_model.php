<?php
function load_model($model, $directory = 'website')
{
    if (function_exists($model)) {
        return;
    }

    require_once ROOT . '/model/' . $directory . '/' . $model . '.php';
}