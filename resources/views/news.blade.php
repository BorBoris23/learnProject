@extends('layout.master')

@section('content')
    <article class="blog-post">
        <h1 class="blog-post-title">News</h1>

        @each('news.item', $news, 'item')

    </article>

    {{ $news->onEachSide(1)->links() }}
@endsection
