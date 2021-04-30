<?php
namespace App\Controller;
use App\Helper\FlashMessage;
use App\Repository\DirectoryRepository;
class DeleteGallery
{
    use FlashMessage;
    public function request(){
        $gallery = ($_GET['name'])
            ? filter_var($_GET['name'],
                FILTER_SANITIZE_STRING)
            : FALSE;
        $directoryRepository = new DirectoryRepository();
        $result = $directoryRepository
            ->deleteDirectory($gallery);
        if($result){
            $type = "alert-success";
            $message = "Gallery deleted successfully!";
        }else{
            $type = "alert-danger";
            $message = "The gallery was not deleted!";
        }
        $this->defineMessage($type, $message);
        header('Location: /admin/list-all-galleries');
    }
}