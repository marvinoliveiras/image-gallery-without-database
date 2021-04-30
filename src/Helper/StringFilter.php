<?php
namespace App\Helper;
trait StringFilter{
    public function filterDirectoryName(
        string $directoryName): ?string
    {
        return preg_replace(
            '/[^a-zA-Z0-9\-+]/', '',
            preg_replace('/ /','-',
                $directoryName
        ));
    }
    public function filterFileName(
        string $fileName): ?string
    {
        return preg_replace('/(\.\.\/)/','',
            preg_replace('/ /','-',
                filter_var($fileName,
                    FILTER_SANITIZE_STRING
                )
            )
        );
    }
}