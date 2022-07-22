@extends('layout.without_sidebar')

@section('content')
    <article class="blog-post">
        <h1 class="blog-post-title">Sample blog post</h1>

        @each('news.item', $news, 'item')

    </article>

    {{ $news->onEachSide(1)->links() }}
@endsection
