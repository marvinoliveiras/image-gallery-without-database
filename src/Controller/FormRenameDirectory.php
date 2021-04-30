<?php
namespace App\Controller;
use App\Helper\FlashMessage;
class FormRenameDirectory
{
    use FlashMessage;
    public function request()
    {
        $pageTitle = "Rename the gallery";
        $action = "rename-gallery";
        $label = 
        "what will be the new name of your gallery?";
        $oldName = isset($_GET['oldName'])
            ? filter_var($_GET['oldName'],
                FILTER_SANITIZE_STRING) : NULL;
        if(is_null($oldName)){
            $this->defineMessage('alert-danger',
            'The gallery name was either not passed
            or invalid!');
            return header('/admin/list-all-galleries');
        }
        require __DIR__.'/../View/name-form.php';
    }
}