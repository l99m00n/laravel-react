<?php

namespace App\Entities\Blog;

class Content
{
    private string $content;

    public function __construct(string $content) {
        $this->content = $content;
    }

    public function content(): string
    {
        return $this->content;
    }
}
