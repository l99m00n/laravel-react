<?php

namespace App\UseCase\Blog;

use App\DomainModel\Blog\BlogList;
use App\Repository\BlogRepositoryInterface;

class GetBlogListUseCase
{
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getBlogList(): BlogList
    {
        return $this->blogRepository->getBlogList();
    }
}
