<?php
namespace App\Controller;
class DirectoryInsertionForm
{
    public function request(){
        $pageTitle = "Insert a new gallery!";
        $action = "persist-gallery";
        $label = "What is the name of your gallery?";
        require __DIR__.'/../View/name-form.php';
    }
}