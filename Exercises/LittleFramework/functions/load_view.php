<?php
function load_view($view, $viewDirectory = null, array $viewParameters = [])
{
    if(null === $viewDirectory) {
        $viewDirectory = 'website';
    }

    $viewPath = ROOT.'/view/'.$viewDirectory.'/'.$view.'.php';
    if(file_exists($viewPath)) {
        foreach ($viewParameters as $variable => $value) {
            $$variable = $value;
        }
        unset($viewDirectory, $viewParameters);
        require $viewPath;
    }
}