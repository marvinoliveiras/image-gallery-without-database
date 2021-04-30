<?php
namespace Tests\Unit;
use PHPUnit\Framework\TestCase;
use App\Helper\CheckFileExtension;
class CheckFileExtensionTest extends TestCase
{
    use CheckFileExtension;
    public function testCorrectlyIdentifyImageExtension()
    {
        $imgJPG = $this->checkIfItIsImage(
            __DIR__.
                '/../files-to-use-for-test/road-with-storm.jpg'
        );
        $fakeImg = $this->checkIfItIsImage(
            __DIR__.
                '/../files-to-use-for-test/fake-img.gif'
        );
        $wrongExtensionImage = $this->checkIfItIsImage(
            __DIR__.
                '/../files-to-use-for-test/wrong-extension-image.png'
        );
        static::assertEquals('.jpg',
            $imgJPG['extension']
        );
        static::assertEquals(NULL,
            $fakeImg
        );
        static::assertEquals('.jpg',
            $wrongExtensionImage['extension']
        );
    }
}