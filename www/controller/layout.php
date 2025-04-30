<?php

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $route = trim($uri, '/');

    if (!preg_match('/^[a-zA-Z0-9_-]*$/', $route)) {
        $route = '404';
    }

    if ($route === '') {
        $route = 'home';
    }

    switch ($route) {
        case 'home':
            require 'page/home.php';
            break;
        case 'about':
            require 'page/about.php';
            break;
        case 'c':
            require 'page/cc.php';
            break;
        case 'contact':
            require 'page/contact.php';
            break;
        case '404':
        default:
            require 'page/404.php';
            break;
    }

?>