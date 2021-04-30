<?php
namespace Tests\Integration;
use App\Controller\DeleteGallery;
use App\Controller\PersistDirectory;
use App\Repository\DirectoryRepository;
use PHPUnit\Framework\TestCase;
class DeleteGalleryTest extends TestCase
{
    private static $deleteGallery;
    private static $directoryRepository;
    private static $persistDirectory;
    public static function setUpBeforeClass(): void
    {
        self::$deleteGallery = new DeleteGallery();
        self::$directoryRepository = new DirectoryRepository();
        self::$persistDirectory = new PersistDirectory();
    }
    public function testDeleteGalleryEmpty()
    {
        $_POST['name'] = "empty test gallery";
        self::$persistDirectory->request();
        $_GET['name'] = "empty-test-gallery";
        self::$deleteGallery->request();
        $galleries = self::$directoryRepository
            ->listAllDirectories();
        static::assertEquals("",
            $galleries->getFileName()
        );
    }
    public function testDeleteGalleryWithFiles()
    {
        $_POST['name'] = "test gallery with files";
        self::$persistDirectory->request();
        $galleries = self::$directoryRepository
            ->listAllDirectories();
        copy("tests/files-to-use-for-test/road-with-storm.jpg",
            "tests/galleries-test/test-gallery-with-files/road-with-storm.jpg"
        );
        static::assertEquals("test-gallery-with-files",
            $galleries->getFileName());
        $_GET['name'] = "test-gallery-with-files";
        self::$deleteGallery->request();
        $galleries = self::$directoryRepository
            ->listAllDirectories();
        static::assertEquals("",
            $galleries->getFileName()
        );
    }
}