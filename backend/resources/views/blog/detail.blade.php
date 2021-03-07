<h1>Blog Detail</h1>

<hr>

<h1>{{ $blog->title() }}</h1>
<p>
    @foreach ($blog->tagList() as $tag)
        <span>{{ $tag->tag() }}</span>
    @endforeach
</p>
<hr>
<p>
{!! $blog->content() !!}
</p>
@foreach ($blog->imageList() as $image)
    <img src={{ $image->path() }} />
@endforeach
