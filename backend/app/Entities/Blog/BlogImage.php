<?php

namespace App\Entities\Blog;

class BlogImage
{
    private string $path;
    private int $height;
    private int $width;

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

    public function width(): int
    {
        return $this->width;
    }
}
