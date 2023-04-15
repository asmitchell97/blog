<x-layout>    
    <h1>
        {{ $post->title }}
    </h1>
    <h2>
        {!! $post->excerpt !!}
    </h2>

    <p>
        By <a href="#">{{ $post->author->username }}</a> in <a href="categories/{{ $post->category->slug }}">{{ $post->category->name }}</a> 
    </p>

    <p>
        {!! $post->body !!}
    </p>

    <a href="/posts">Back to posts</a>

</x-layout>