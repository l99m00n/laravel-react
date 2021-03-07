<?php

namespace App\Http\Controllers;

use App\UseCase\Blog\GetBlogListUseCase;

class BlogController
{
    public function index(GetBlogListUseCase $useCase)
    {
        $blogs = $useCase->getBlogList();
        return view('blog.index', ['blogs' => $blogs->list()]);
    }
}
