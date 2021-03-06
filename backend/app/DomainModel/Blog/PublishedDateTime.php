<?php

namespace App\DomainModel\Blog;

class PublishedDateTime
{
    private $dateTime;

    public function __construct(string $dateTime) {
        $this->dateTime = $dateTime;
    }

    public function dateTime(): string
    {
        return $this->dateTime;
    }
}
