<?php
namespace App\Repository;
use App\Helper\{
    FlashMessage, StringFilter};
use FilesystemIterator;
class DirectoryRepository
{
    use FlashMessage,
        StringFilter;
    public function CreateDirectory(
        string $galleryName)
    {
        $filteredGalleryName = $this
            ->filterDirectoryName($galleryName);
        $pathDirectory = PREFIXPATH
            .$filteredGalleryName;
        if(is_dir($pathDirectory)){
            return "double";
        }
        return mkdir($pathDirectory, 0755);
    }
    public function listAllDirectories()
    {
        return new FilesystemIterator(
            PREFIXPATH
        );
    }
    public function deleteDirectory(
        string $galleryName)
    {
        $filteredGalleryName = $this
            ->filterDirectoryName(
                $galleryName
            ); 
        $path = PREFIXPATH
            .$filteredGalleryName;
        $imagesRepository = new ImagesRepository();
        $imagesRepository->deleteAllFiles($path);
        return (is_dir($path))
            ? rmdir($path) : false;
    }
    public function renameDirectory(
        string $oldName,string $newName)
    {
        $filteredOldName = $this
            ->filterDirectoryName($oldName);
        $filteredNewName = $this
            ->filterDirectoryName($newName);
        $oldName = PREFIXPATH.$filteredOldName;
        $newName = PREFIXPATH.$filteredNewName;
        return (is_dir($oldName) && !is_dir($newName))
            ? rename($oldName, $newName): FALSE;
    }
}