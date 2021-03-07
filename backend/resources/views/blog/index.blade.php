<h1>Blog List</h1>
<hr>
@foreach ($blogs as $blog)
    <a href={{ route('blog-detail', ['blogId' => $blog->id()]) }}>{{ $blog->title() }}</p>
    <p>
        @foreach($blog->tagList() as $tag)
            <span>{{ $tag->tag() }}</span>
        @endforeach
    </p>
    <p>{{ $blog->published() }}</p>
    @foreach ($blog->imageList() as $image)
        <img src={{ $image->path() }} width={{ $image->width() }} height={{ $image->height() }}/>
    @endforeach
    <hr>
@endforeach
