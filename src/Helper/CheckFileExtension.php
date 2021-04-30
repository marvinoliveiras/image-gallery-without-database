<?php
namespace App\Helper;
trait CheckFileExtension
{
    public function checkIfItIsImage(
        string $tmpName): ?array
    {
        $fileType = mime_content_type($tmpName);
        $fileExtension = $this
            ->idendifyImageExtension($fileType);
        return $fileExtension;
    }
    public function idendifyImageExtension(
        $fileType): ?array
    {
        $allowedExtensions = [
            'image/png' => [
                'extension' => '.png',
                'function' => 'imagepng'],
            'image/jpeg' => [
                'extension' => '.jpg',
                'function' => 'imagejpeg'],
            'image/gif' => [
                'extension' => '.gif',
                'function' => 'imagegif'],
            'image/bmp' => [
                'extension' => '.bmp',
                'function' => 'imagebmp']
        ];
        return array_key_exists(
            $fileType, $allowedExtensions)
                ? $allowedExtensions[$fileType]
                : NULL;
    }
}