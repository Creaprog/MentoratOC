<?php
session_start();
if (isset($_SESSION['pseudo'], $_SESSION['password']) && $_SESSION['pseudo'] && $_SESSION['password']) {
    $pseudo = htmlspecialchars($_SESSION['pseudo']);
    $password = htmlspecialchars($_SESSION['password']);
    require_once 'functions/check_login.php';
    if (check_login($pseudo, $password) == false) {
        header('Location: login.php');
    } else {
        require_once 'functions/check_access.php';
        $acces = check_access($pseudo);
        echo $acces;
    }
} else {
    header('Location: login.php');
}