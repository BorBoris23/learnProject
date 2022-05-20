@extends('layout.master')

@section('content')

        <article class="blog-post">
            <h2 class="blog-post-title">{{$article->header}}</h2>
            <p class="blog-post-meta">{{$article->created_at}}</p>
            <p>Author - User</p>
            <p>{{$article->content}}</p>
            @include('article.tags')
            <hr>
        </article>

        <div>
            <a href="/article/{{$article->id}}/edit">Go to edit article</a>
        </div>
        <div>
            <a href="/">Go back to the main page</a>
        </div>

@endsection

