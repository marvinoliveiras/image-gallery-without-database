<?php
$files = new FilesystemIterator(
    __DIR__.'/public/assets/img'
);
foreach($files as $file){
    echo $file
        ->getFilename().PHP_EOL;
}