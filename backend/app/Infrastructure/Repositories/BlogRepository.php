<?php

namespace App\Infrastructure\Repositories;

use App\Services\MicroCms;
use App\Entities\Blog\Blog;
use App\Entities\Blog\Title;
use App\Entities\Blog\BlogId;
use App\Entities\Blog\BlogTag;
use App\Entities\Blog\Content;
use App\Entities\Blog\TagList;
use App\Entities\Blog\BlogList;
use App\Entities\Blog\BlogImage;
use App\Entities\Blog\ImageList;
use App\Entities\Blog\PublishedDateTime;
use App\Repositories\BlogRepositoryInterface;

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
