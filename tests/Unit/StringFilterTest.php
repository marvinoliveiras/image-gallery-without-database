<?php
namespace Tests\Unit;
use App\Helper\StringFilter;
use PHPUnit\Framework\TestCase;
class StringFilterTest extends TestCase
{
    use StringFilter;
    public function testWhetherToRemoveInvalidCharactersFromTheFileName()
    {
        $fileName = '../teste<script> arquivo.jpg';
        $filtredFileName = $this
            ->filterFileName($fileName);
        static::assertEquals(
            'teste-arquivo.jpg',
            $filtredFileName
        );
    }
    public function testWhetherToRemoveInvalidCharactersFromTheDirectoryName()
    {
        $directoryName = '../directory <script> #$* Name!';
        $filtredDirectoryName = $this
        ->filterDirectoryName($directoryName);

        static::assertEquals(
            'directory-script--Name',
            $filtredDirectoryName);
    }
}