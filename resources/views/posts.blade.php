<h1>Posts</h1>

<x-layout>
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

    <x-fancybutton>Click me</x-fancybutton>

</x-layout>