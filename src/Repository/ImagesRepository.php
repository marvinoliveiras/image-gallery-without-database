<?php
namespace App\Repository;
use App\Helper\{CheckFileExtension,
    FlashMessage,StringFilter};
use FilesystemIterator;
class ImagesRepository
{
    use CheckFileExtension,
        StringFilter,
        FlashMessage;
    public function insertImage(
        string $gallery,string $tmpName)
    {
        $fileExtension = $this
            ->checkIfItIsImage($tmpName);
        $path = PREFIXPATH.$gallery.'/';
        if($fileExtension && is_dir($path)){
            $nameAndPath = 
                $path.md5(date(microtime()))
                    .'.'.$fileExtension['extension'];
            $newImage = $this->recreateImage(
                $tmpName
            );
            $result = $fileExtension['function'](
                $newImage,$nameAndPath
            );
            imagedestroy($newImage);
            return $result;
        }
        return 0;
    }
    public function listSpecificQuantity(
        string $gallery, $quantity)
    {
        $pathGallery = PREFIXPATH.$gallery;
        $files = is_dir($pathGallery)
            ? new FilesystemIterator($pathGallery)
            : [];
        $images = [];
        $i = 0;
        foreach($files as $file){
            if($i < $quantity || $quantity === 'all'){
                $checkIfItIsImage = $this
                    ->checkIfItIsImage(
                        $file->getPathname());
                ($checkIfItIsImage)
                    ? $images[] = $file->getFileName()
                    :'';
                $i++;
            }else{
                return $images;
            }
        }
        return $images;
    }
    public function rename(
        string $pathGallery,
        string $oldName,
        string $newName)
    {
        $filtredPathGallery = $this
            ->filterDirectoryName($pathGallery);
        $newNameFiltred = $this
            ->filterFileName($newName);
        $oldFileNameAndPath = PREFIXPATH
            .$filtredPathGallery.'/'.$oldName;
        $fileExtension = $this
            ->checkIfItIsImage($oldFileNameAndPath);
        $newFileNameAndPath = PREFIXPATH
            ."$filtredPathGallery/"
            .$newNameFiltred.$fileExtension['extension'];
        if(!is_file($oldFileNameAndPath)
            || is_null($fileExtension)
            || is_file($newFileNameAndPath)){
            return NULL;
        }
        return rename($oldFileNameAndPath,
            $newFileNameAndPath);
    }
    public function deleteAllFiles(
        string $path)
    {
        $files = is_dir($path)
        ? new FilesystemIterator($path)
        : false;
        if(!is_bool($files)){
            foreach($files as $file){
                unlink($file->getPathName());
            }
        }
    }
    public function deleteOneFile(
        string $pathGallery,string $imageName)
    {
        $directory = $this
            ->filterDirectoryName($pathGallery);
        $filteredImageName = $this
            ->filterFileName($imageName);
        $path = PREFIXPATH
            .$directory.'/';
        return is_dir($path)
            && is_file($path.$filteredImageName)
                ? unlink($path.$filteredImageName)
                : FALSE;
    }
    public function recreateImage($tmpName)
    {
        $imgStream = imagecreatefromstring(
            file_get_contents($tmpName)
        );
        $imgWidth = imagesx($imgStream);
        $imgHeight = imagesy($imgStream);
        $newImg = imagecreatetruecolor(
            $imgWidth, $imgHeight
        );
        imagealphablending($newImg,
            false);
        imagesavealpha($newImg,
            true);
        imagealphablending($newImg,
            true);
        $color = imagecolorallocatealpha(
            $newImg,0x00,0x00,0x00,127
        );
        imagefill($newImg, 0, 0, $color);
        imagecopyresampled(
            $newImg, $imgStream,
            0, 0, 0, 0, $imgWidth,
            $imgHeight, $imgWidth,
            $imgHeight
        );
        return $newImg;
    }
}