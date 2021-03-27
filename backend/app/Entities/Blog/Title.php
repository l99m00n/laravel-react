<?php

namespace App\Entities\Blog;

class Title
{
    private string $title;

    public function __construct(string $title) {
        $this->title = $title;
    }

    public function title(): string
    {
        return $this->title;
    }
}
