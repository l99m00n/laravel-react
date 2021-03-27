<?php

namespace App\UseCases\Blog;

use App\Entities\Blog\BlogList;
use App\Repositories\BlogRepositoryInterface;

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
