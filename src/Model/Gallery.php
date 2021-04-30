<?php
namespace App\Model;
use SplFileInfo;
class Gallery
{
    private string $path;
    private string $name;
    private array $images;
    public function __construct(
        SplFileInfo $directory,
        array $images)
    {
        $this->path = $directory
            ->getPathname();
        $this->name = $directory
            ->getFilename();
        $this->images = $images;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getPath(): ?string
    {
        return $this->path;
    }
    public function getImages(): ?array
    {
        return $this->images;
    }
}