<?php
namespace App\Controller;
use App\Helper\{
    FlashMessage,
    StringFilter};
use App\Repository\ImagesRepository;
class RemoveFile
{
    use StringFilter,
        FlashMessage;
    public function request(){
        $file = isset($_GET['image']) 
            ? $_GET['image']
            : FALSE;
        $gallery = isset($_GET['gallery'])
            ? $_GET['gallery']
            : FALSE;
        $repository = new ImagesRepository();
        $result = $repository
            ->deleteOneFile($gallery,$file);
        if($result){
            $typeMessage = "alert-success";
            $message = "Image successfully deleted!";
            $redirect=
                "/admin/manage-images-from-the-gallery?gallery={$gallery}";
        }else{
            $typeMessage = "alert-danger";
            $message = "The image has not been deleted!";
            $redirect= "/admin/list-all-galleries";
        }
        $this->defineMessage($typeMessage, $message);
        header("Location: {$redirect}");
    }
}