<?php
require_once __DIR__.
    '/../vendor/autoload.php';
require_once __DIR__.
    '/../config/constant.php';
!headers_sent() ? session_start():'';
$way = isset($_SERVER['PATH_INFO'])
    ? $_SERVER['PATH_INFO']
    : "/";
$routes = require __DIR__.
    '/../config/routes.php';
$identifyClass = isset($routes[$way])
    ? $routes[$way]
    : 'App\Controller\Sys\PageNotFound';
$class = new $identifyClass();
$class->request();