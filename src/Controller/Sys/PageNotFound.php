<?php
namespace App\Controller\Sys;
class PageNotFound{
    public function request(){
        $pageTitle = 'Page not Found!';
        require_once __DIR__.'/../../View/Sys/404.php';
    }

}