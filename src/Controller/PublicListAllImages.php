<?php
namespace App\Controller;
use App\Helper\FlashMessage;
use App\Repository\ImagesRepository;
class PublicListAllImages
{
    use FlashMessage;
    public function request()
    {
        $gallery = isset($_GET['gallery'])
            ? filter_var($_GET['gallery'],
                FILTER_SANITIZE_STRING)
            : FALSE;
        if(!$gallery){
            $this->defineMessage('alert-danger',
                'Gallery name was not submitted or invalid'
            );
            header('Location: /');
            return;
        }
        $repository = new ImagesRepository();
        $images = $repository
            ->listSpecificQuantity($gallery, 'all');
        $pageTitle = $gallery;
    require __DIR__.'/../View/list-images-by-gallery.php';
    }
}