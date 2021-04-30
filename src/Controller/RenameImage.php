<?php
namespace App\Controller;
use App\Helper\FlashMessage;
use App\Repository\ImagesRepository;
class RenameImage
{
    use FlashMessage;
    public function request(){
        $newName = isset($_POST['name'])
            ? filter_var($_POST['name'])
            : NULL;
        $oldName = isset($_POST['oldName'])
            ? filter_var($_POST['oldName'])
            : NULL;
        $gallery = isset($_POST['gallery'])
            ? filter_var($_POST['gallery'])
            : NULL;
        $matchs = array_intersect(["", null],
            [$newName, $oldName, $gallery]);
        if(count($matchs) > 0){
            $this->defineMessage(
                "alert-danger",
                "New name, old name or gallery name is invalid or empty!"
            );
            header('Location:/admin/list-all-galleries');
            return;
        }
        $repository = new ImagesRepository();
        $result = $repository->rename(
            $gallery, $oldName, $newName);
        if($result){
            $type = "alert-success";
            $message = "Successfully renamed image";
        }else{
            $type = "alert-danger";
            $message= "some failure happened";
        }
        $this->defineMessage($type, $message);
        return header(
            "Location: /admin/manage-images-from-the-gallery?gallery={$gallery}");
    }
}