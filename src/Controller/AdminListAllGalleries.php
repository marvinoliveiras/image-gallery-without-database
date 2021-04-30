<?php
namespace App\Controller;
use App\Model\Gallery;
use App\Repository\DirectoryRepository;
use App\Repository\ImagesRepository;
class AdminListAllGalleries
{
    public function request()
    {
        $pageTitle = 'List of galleries';
        $directoriesRepository = new DirectoryRepository();
        $directories = $directoriesRepository
            ->listAllDirectories();
        $imagesRepository = new ImagesRepository();
        $galleries = [];
        foreach($directories as $directory){
            $galleries[] = new Gallery(
                $directory,
                $imagesRepository
                    ->listSpecificQuantity(
                        $directory->getFilename(),
                            '4'
            ));
        }
        require __DIR__.'/../View/admin-list-all-galleries.php';
    }
}