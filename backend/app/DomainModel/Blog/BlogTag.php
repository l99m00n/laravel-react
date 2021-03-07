<?php

namespace App\DomainModel\Blog;

class BlogTag
{
    private $tag;

    public function __construct(string $tag) {
        $this->tag = $tag;
    }

    public function tag(): string
    {
        return $this->tag;
    }
}
