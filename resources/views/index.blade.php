@extends('layout.master')

@section('content')
        <article class="blog-post">
            <h1 class="blog-post-title">Sample blog post</h1>

            @include('layout.success')

            @each('article.item', $articles, 'article')

        </article>

        {{ $articles->onEachSide(1)->links() }}
@endsection
