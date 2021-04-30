<?php
namespace App\Controller;
class Dashboard
{
    public function request()
    {
        $pageTitle = 'Welcome to your control panel';
        require_once __DIR__.'/../View/dashboard.php';
    }
}