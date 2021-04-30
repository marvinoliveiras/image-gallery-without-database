<?php
namespace Tests\Integration;
use App\Controller\{DeleteGallery,
    PersistDirectory};
use PHPUnit\Framework\TestCase;
class PersistDirectoryTest extends TestCase
{
    private $persistDirectory;
    public function setUp(): void
    {
        $this->persistDirectory = new PersistDirectory();
    }
    public function testEmptyGalleryNamePass(): void
    {
        $_POST['name'] = '';
        $this->persistDirectory->request();
        $this->assertEquals(
            "Name field was not filled, fill it in and then resend",
            $_SESSION['message']
        );
    }
    public function testNullGalleryNamePass()
    {
        $this->persistDirectory->request();
        $this->assertEquals(
            "Name field was not filled, fill it in and then resend",
            $_SESSION['message']
        );
    }
    public function testGalleryCreation()
    {
        $_POST['name'] = 'test-gallery';
        $this->persistDirectory->request();
        $this->assertEquals(
            "Gallery inserted successfully",
            $_SESSION['message']
        );
    }
    public function tearDown(): void
    {
        $_GET['name'] = "test-gallery";
        $deleteGallery = new DeleteGallery();
        $deleteGallery->request();
    }
}