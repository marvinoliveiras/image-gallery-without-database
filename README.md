# Image gallery without database
This image gallery was developed using only PHP in the beckend, it is not necessary to use a database. As for the frontend, it was developed using only HTML, CSS and JavaScript.

[![list of galleries](/public/assets/img/screenshot/list-galleries.jpg "list of galleries")](/public/assets/img/screenshot/list-galleries.jpg "list of galleries")

[![list of images](/public/assets/img/screenshot/list-images.jpg "list of images")](/public/assets/img/screenshot/list-images.jpg "list of images")


## 1. how is it possible not to use DB?
This is possible thanks to the FilesystemIterator class, this class is native to PHP and it returns a list of files and folders that are inside the directory informed in its constructor.
Note: this instance of FilesystemIterator, as its name suggests, is iterable as an array, that is, it can be used directly in a repetition structure such as for (), foreach () and etc.. See the example:
```php
<?php
$files = new FilesystemIterator(
    __DIR__.'/public/assets/img'
);
foreach($files as $file){
    echo $file
        ->getFilename().PHP_EOL;
}
```
####The above code will print:
```php
folder-2741806_1280.png
gallery
icons
screenshot
top_directory.png
wall-2558279_1920.jpg
```


##2. How to use?


###2.1Clone the repository:

`git clone https://github.com/marvinoliveiras/image-gallery-without-database`

###2.2 Install the dependencies:

`composer install`

###2.3 Go up your PHP server:

`php -s localhost: 80 -t public`


###2.4 Main routes:
- Public home: `http://localhost`
- Admin home: `http://localhost/admin`


## 3. Dependencies:
- PHP 7 or above;


### 3. 1 Development environment:
- phpunit / phpunit;


### 3.2 Production environment:
- PSR4 (Symfony autoload);


## 4. License:
- MIT