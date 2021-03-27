<?php

namespace App\Http\Controllers;

use App\UseCases\Blog\GetBlogUseCase;
use App\UseCases\Blog\GetBlogListUseCase;

class BlogController
{
    public function index(GetBlogListUseCase $useCase)
    {
        $blogs = $useCase->getBlogList();
        return view('blog.index', ['blogs' => $blogs->list()]);
    }

    public function detail(string $id, GetBlogUseCase $useCase)
    {
        $blog = $useCase->getBlog($id);
        return view('blog.detail', ['blog' => $blog]);
    }
}
