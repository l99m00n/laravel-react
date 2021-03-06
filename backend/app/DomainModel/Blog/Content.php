<?php

namespace App\DomainModel\Blog;

class Content
{
    private $content;

    public function __construct(
        string $content
    ) {
        $this->content = $content;
    }

    public function content(): string
    {
        return $this->content;
    }
}
