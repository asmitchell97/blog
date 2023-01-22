<!DOCTYPE html>

<title>Posts</title>
<link rel="stylesheet" href="/css/app.css">

<body>
    <h1>Posts</h1>

    @foreach ($posts as $post) 
        <article>
            <h1>
                <a href="/posts/{{ $post->getSlug() }}">
                    {{ $post->getTitle() }}
                </a>
            </h1>
            <p>{!! $post->getExcerpt() !!}</p>
        </article>
    @endforeach
</body>