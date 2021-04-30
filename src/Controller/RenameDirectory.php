<?php
namespace App\Controller;
use App\Helper\FlashMessage;
use App\Repository\DirectoryRepository;
class RenameDirectory
{
    use FlashMessage;
    public function request()
    {
        $oldName = isset($_POST['oldName'])
            ? $_POST['oldName']
            : NULL;
        $newName = isset($_POST['name'])
            ? $_POST['name']
            : NULL;
        if(!$oldName || !$newName){
        $this->defineMessage(
            'alert-danger',
            'The gallery name has not been changed.
            You have submitted an invalid new and/or old name(s).');
            return header('Location: /admin/list-all-galleries');
        }
        $repository = new DirectoryRepository();
        $result = $repository
            ->renameDirectory(
                $oldName, $newName
            );
        if($result){
            $type = 'alert-success';
            $message = 'Name changed successfully!';
        }else{
            $type = 'alert-danger';
            $message = 'The gallery name has not been changed';
        }
        $this->defineMessage($type, $message);
        header('Location: /admin/list-all-galleries');
    }
}