<?php

namespace App\Entities\Blog;

class TagList
{
    private $list;

    public function __construct()
    {
        $this->list = [];
    }

    public function add(BlogTag $tag): void
    {
        $this->list[] = $tag;
    }

    public function list(): array
    {
        return $this->list;
    }
}
