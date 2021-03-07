<?php

namespace App\Repository;

use App\DomainModel\Blog\Blog;
use App\DomainModel\Blog\BlogList;

interface BlogRepositoryInterface
{
    public function getBlogList(): BlogList;
    public function getBlog(string $id): Blog;
}
