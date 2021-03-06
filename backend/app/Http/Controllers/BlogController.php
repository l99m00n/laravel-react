<?php

namespace App\Http\Controllers;

use App\UseCase\Blog\GetBlogListUseCase;

class BlogController
{
    public function index(GetBlogListUseCase $useCase)
    {
        $blogs = $useCase->getBlogList();
        dd($blogs);
        return view('blog.index', ['blogs' => $blogs]);
    }
}
