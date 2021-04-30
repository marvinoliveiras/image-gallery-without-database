<?php
namespace App\Controller;
use App\Helper\FlashMessage;
use App\Repository\DirectoryRepository;
class PersistDirectory
{
    use FlashMessage;
    public function request()
    {
        $name = isset($_POST['name'])
            ? filter_var($_POST['name'],
                FILTER_SANITIZE_STRING)
            : "Not sent";
        $repository = new DirectoryRepository();
        $result = ($name != false && $name != "Not sent")
            ? $repository->CreateDirectory($name)
            : "Empty name";
        [$typeMessage, $message, $redirect] =
            $this->checkTheResult($result, $name);
        $this->defineMessage(
            $typeMessage,
            $message
        );
        header(
            "Location: {$redirect}"
            , TRUE
        );
    }
    private function checkTheResult($result, $name)
    {
        $typeMessage = "alert-success";
        $message = "Gallery inserted successfully";
        $redirect = "/admin/images-insertion-form?gallery={$name}";

        if($result === "Empty name"){
            $typeMessage = "alert-danger";
            $message = "Name field was not filled, fill it in and then resend";
            $redirect = "/admin/gallery-insertion-form";
        }
        elseif($result === "double"){
            $typeMessage = "alert-danger";
            $message = 
                "gallery already exists, it is not possible to have two galleries with the same name!";
            $redirect = '/admin/gallery-insertion-form';
        }elseif(!$result){
            $typeMessage = "alert-danger";
            $message = "There was a problem with the creation of the gallery!!";
            $redirect = '/admin/gallery-insertion-form';
        }
        return [$typeMessage, $message, $redirect];
    }
}