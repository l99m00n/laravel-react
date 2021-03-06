<?php

namespace App\DomainModel\Blog;

class Title
{
    private $title;

    public function __construct(string $title) {
        $this->title = $title;
    }

    public function title(): string
    {
        return $this->title;
    }
}
