<?php

namespace App\UseCase\Blog;

use App\DomainModel\Blog\Blog;
use App\Repository\BlogRepositoryInterface;

class GetBlogUseCase
{
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getBlog(string $id): Blog
    {
        return $this->blogRepository->getBlog($id);
    }
}
