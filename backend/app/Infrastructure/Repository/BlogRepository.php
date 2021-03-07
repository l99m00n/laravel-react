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
            $blogList->add($this->buildBlog($apiBlog));
        }

        return $blogList;
    }

    public function getBlog(string $id): Blog
    {
        $apiBlog = (new MicroCms())->get('blog', ['ids' => $id]);
        // TODO 不正なid指定の対応
        return $this->buildBlog($apiBlog['contents'][0]);
    }

    private function buildBlog(array $apiBlogContents)
    {
        $tagList = new TagList();
        foreach ($apiBlogContents['tag'] as $apiTag) {
            $tagList->add(new BlogTag($apiTag));
        }

        // microCMSブログには画像は1枚しか登録できないかも？
        // 画像は設定されていないこともある。
        $imageList = new ImageList();
        if (isset($apiBlogContents['image'])) {
            $imageList->add(new BlogImage(
                $apiBlogContents['image']['url'],
                $apiBlogContents['image']['height'],
                $apiBlogContents['image']['width']
            ));
        }

        $blog = new Blog(
            new BlogId($apiBlogContents['id']),
            new Title($apiBlogContents['title']),
            new Content($apiBlogContents['content']),
            $tagList,
            $imageList,
            new PublishedDateTime($apiBlogContents['publishedAt'])
        );

        return $blog;
    }
}
