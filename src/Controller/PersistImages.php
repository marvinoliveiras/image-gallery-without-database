<?php
namespace App\Controller;
use App\Helper\{
    FlashMessage,StringFilter};
use App\Repository\ImagesRepository;
class PersistImages{
    use FlashMessage,
        StringFilter;
    public function request()
    {
        $images = isset($_FILES['images'])
            ? $_FILES['images']: NULL;
        $directory = isset($_POST['gallery'])
            ? $this->filterDirectoryName(
                $_POST['gallery'])
            : NULL;
        $imagesRepository = new ImagesRepository();
        for($i = 0;$i < sizeof($images['name']); $i++){
            $result = ($images['error'][$i] == 0)
                ? $result = $imagesRepository
                    ->insertImage(
                        $directory,
                        $images['tmp_name'][$i]
                    )
                : 0;
            ($result > 0)
                ? static::$successCounter++
                : $this->definePrefixAndSuffixFromErrorMessage(
                    $images['name'][$i]
                );
        }
        $this->mountSuccessMessage();
        $typeMessage = $this->defineMessageType(
            static::$successCounter,
            static::$suffixForErrorMessage
        );
        $message = $this->setFinalMessage();
        $this->defineMessage(
            $typeMessage, $message
        );
        return header(
            'Location: /admin/list-all-galleries'
        );
    }
}