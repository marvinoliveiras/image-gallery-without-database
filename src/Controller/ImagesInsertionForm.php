<?php
namespace App\Controller;
class ImagesInsertionForm
{
    public function request(){
        $pageTitle = "Select the images to insert in the gallery!";
        $gallery = isset($_GET['gallery'])
            ? filter_var($_GET['gallery'],
                FILTER_SANITIZE_STRING)
            :header('Location: /admin/list-gallerys');
        require __DIR__. '/../View/images-insertion-form.php';
    }
}