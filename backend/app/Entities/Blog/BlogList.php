<?php

namespace App\Entities\Blog;

class BlogList
{
    private $list;

    public function __construct()
    {
        $this->list = [];
    }

    public function add(Blog $blog): void
    {
        $this->list[] = $blog;
    }

    public function list(): array
    {
        return $this->list;
    }
}
