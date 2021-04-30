<?php
namespace Tests\Integration;
use App\Controller\{
    PersistDirectory,RemoveFile
};
use App\Repository\DirectoryRepository;
use App\Repository\ImagesRepository;
use PHPUnit\Framework\TestCase;
class RemoveFileTest extends TestCase
{
    private $removeFile;
    private $persistGallery;
    private $imagesRepository;
    public function setUp(): void
    {
        $this->removeFile = new RemoveFile();
        $this->persistGallery = new PersistDirectory();
        $this->imagesRepository = new ImagesRepository();
        define('PATHTOTHETESTFILES',
            __DIR__
            .'/../files-to-use-for-test/');
        define('GALLERIESTEST',
            __DIR__.'/../galleries-test/'
        );
    }
    public function testExclusionOfImage()
    {
        $_POST['name'] = 'gallery-test';
        $this->persistGallery->request();
        copy(PATHTOTHETESTFILES
            .'road-with-storm.jpg',
            GALLERIESTEST.
            'gallery-test/road-with-storm.jpg'
        );
        $_GET['gallery'] = $_POST['name'];
        $_GET['image'] = 'road-with-storm.jpg';
        $this->removeFile->request();
        $result = $this->imagesRepository
            ->listSpecificQuantity(
                $_GET['gallery'], 'all'
            );
        static::assertEquals(
            'Image successfully deleted!',
            $_SESSION['message']
        );
        static::assertEquals(0,
            count($result)
        );
    }
    public function tearDown(): void
    {
        $directoryRepository = new DirectoryRepository();
        $directoryRepository
            ->deleteDirectory('gallery-test');
    }
}