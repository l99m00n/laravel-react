<?php

namespace App\Http\Controllers;

use App\Services\MicroCms;

class BlogController
{
    public function index()
    {
        $service = new MicroCms();
        $blogs = $service->get('blog');
        return view('blog.index', ['blogs' => $blogs]);
    }
}