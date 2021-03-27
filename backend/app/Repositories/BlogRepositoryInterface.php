<?php

namespace App\Repositories;

use App\Entities\Blog\Blog;
use App\Entities\Blog\BlogList;

interface BlogRepositoryInterface
{
    public function getBlogList(): BlogList;
    public function getBlog(string $id): Blog;
}
