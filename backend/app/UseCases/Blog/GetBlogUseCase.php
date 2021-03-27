<?php

namespace App\UseCases\Blog;

use App\Entities\Blog\Blog;
use App\Repositories\BlogRepositoryInterface;

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
