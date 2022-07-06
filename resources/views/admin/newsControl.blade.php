@extends('layout.without_sidebar')

@section('content')
    <article class="blog-post">
        <h1 class="blog-post-title">Sample blog post</h1>

        @each('news.item', $news, 'item')

    </article>

    <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled">Newer</a>
    </nav>
@endsection
