<?php

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $route = trim($uri, '/');

    // ตรวจสอบเส้นทาง ไม่ให้หลุดช่องโหว่ ี url injection 
    // ซึ่งนำไม่สู่ command injection 
    if (!preg_match('/^[a-zA-Z0-9_-]*$/', $route)) {
        $route = '404';
    }

    if ($route === '') {
        $route = 'home';
    }

    // แนะนำ ไม่ควรตั้งชื่อ path ให้ตรงกับชื่อไฟล์ ป้องกันการค้นหาชื่อไฟล์เพื่อทำการเจาะระบบ
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