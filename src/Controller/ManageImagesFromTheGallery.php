<?php
namespace App\Controller;
use App\Helper\FlashMessage;
use App\Repository\ImagesRepository;
class ManageImagesFromTheGallery
{
    use FlashMessage;
    public function request(){
        if(!$_GET['gallery'] || !is_dir(
            PREFIXPATH.$_GET['gallery'])){
            $this->defineMessage(
                'alert-danger',
                'the gallery you tried to
                manage does not exist!'
            );
            header('Location: /admin/list-all-galleries');
            return exit();
        }
        $pageTitle = "Manage images from gallery";
        $gallery = filter_var($_GET['gallery'],
            FILTER_SANITIZE_STRING);
        $repository = new ImagesRepository();
        $images = $repository->listSpecificQuantity(
            $gallery, "all");
        require __DIR__.
            '/../View/manage-images-by-gallery.php';
    }
}