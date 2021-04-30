<?php
namespace App\Controller;
use App\Helper\FlashMessage;
class FormRenameImage
{
    use FlashMessage;
    public function request()
    {
        $oldName = isset($_GET['oldName'])
            ? filter_var($_GET['oldName'],
                FILTER_SANITIZE_STRING)
            : NULL;
        $gallery = isset($_GET['gallery'])
            ? filter_var($_GET['gallery'],
                FILTER_SANITIZE_STRING)
            : NULL;
        if(!$oldName || !$gallery){
            $this->defineMessage(
                'alert-danger',
                'error-message');
            return header(
                "Location:/admin/manage-images-from-the-gallery?gallery={
                    $gallery
                }");
        }
        $pageTitle = "Rename image";
        $action = "rename-image";
        $label = "what will be the new name of the image?";
        require __DIR__ . "/../View/name-form.php";
    }
}