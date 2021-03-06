<?php

namespace App\DomainModel\Blog;

class BlogImage
{
    private $path;
    private $height;
    private $width;

    public function __construct(
        string $url,
        int $height,
        int $width
    ) {
        $this->path = $url;
        $this->height = $height;
        $this->width = $width;
    }

    public function path(): string
    {
        return $this->path;
    }

    public function height(): int
    {
        return $this->height;
    }

    public function weight(): int
    {
        return $this->width;
    }
}
