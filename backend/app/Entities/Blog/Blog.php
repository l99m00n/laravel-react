<?php

namespace App\Entities\Blog;

class Blog
{
    private BlogId $blogId;
    private Title $title;
    private Content $content;
    private TagList $tagList;
    private ImageList $imageList;
    private PublishedDateTime $published;

    public function __construct(
        BlogId $blogId,
        Title $title,
        Content $content,
        TagList $tagList,
        ImageList $imageList,
        PublishedDateTime $publishedDateTime
    ) {
        $this->blogId = $blogId;
        $this->title = $title;
        $this->content = $content;
        $this->tagList = $tagList;
        $this->imageList = $imageList;
        $this->published = $publishedDateTime;
    }

    public function id(): string
    {
        return $this->blogId->id();
    }

    public function title(): string
    {
        return $this->title->title();
    }

    public function content(): string
    {
        return $this->content->content();
    }

    public function tagList(): array
    {
        return $this->tagList->list();
    }

    public function imageList(): array
    {
        return $this->imageList->list();
    }

    public function published(): string
    {
        return $this->published->dateTime();
    }
}
