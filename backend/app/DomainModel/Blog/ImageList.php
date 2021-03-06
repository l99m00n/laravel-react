<?php

namespace App\DomainModel\Blog;

class ImageList
{
    private $list;

    public function __construct()
    {
        $this->list = [];
    }

    public function add(BlogImage $image)
    {
        $this->list[] = $image;
    }

    public function list(): array
    {
        return $this->list;
    }
}
