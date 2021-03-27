<?php

namespace App\Entities\Blog;

class BlogTag
{
    private string $tag;

    public function __construct(string $tag) {
        $this->tag = $tag;
    }

    public function tag(): string
    {
        return $this->tag;
    }
}
