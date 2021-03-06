<?php

namespace App\Infrastructure\Repository;

use App\Services\MicroCms;
use App\DomainModel\Blog\Blog;
use App\DomainModel\Blog\Title;
use App\DomainModel\Blog\BlogId;
use App\DomainModel\Blog\BlogTag;
use App\DomainModel\Blog\Content;
use App\DomainModel\Blog\TagList;
use App\DomainModel\Blog\BlogList;
use App\DomainModel\Blog\BlogImage;
use App\DomainModel\Blog\ImageList;
use App\DomainModel\Blog\PublishedDateTime;
use App\Repository\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    public function getBlogList(): BlogList
    {
        $blogList = new BlogList();

        $apiBlogs = (new MicroCms())->get('blog');
        $contents = $apiBlogs['contents'];
        foreach ($contents as $apiBlog) {
            $tagList = new TagList();
            foreach ($apiBlog['tag'] as $apiTag) {
                $tagList->add(new BlogTag($apiTag));
            }

            // microCMSブログには画像は1枚しか登録できないかも？
            $imageList = new ImageList();
            $imageList->add(new BlogImage(
                $apiBlog['image']['url'],
                $apiBlog['image']['height'],
                $apiBlog['image']['width']
            ));
            $blog = new Blog(
                new BlogId($apiBlog['id']),
                new Title($apiBlog['title']),
                new Content($apiBlog['content']),
                $tagList,
                $imageList,
                new PublishedDateTime($apiBlog['publishedAt'])
            );
            $blogList->add($blog);
        }

        return $blogList;
    }

    public function getBlog(int $id): Blog
    {
        $blog = new Blog();
        return $blog;
    }
}
