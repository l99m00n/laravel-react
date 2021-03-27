<?php

namespace App\Entities\Blog;

class PublishedDateTime
{
    private string $dateTime;

    public function __construct(string $dateTime) {
        $this->dateTime = $dateTime;
    }

    public function dateTime(): string
    {
        return $this->dateTime;
    }
}
