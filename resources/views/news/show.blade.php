@extends('layout.without_sidebar')

@section('content')

    <article class="blog-post">
        <h2 class="blog-post-title">{{$news->header}}</h2>
        <p class="blog-post-meta">{{$news->created_at}}</p>
        <hr>
        <p class="blog-post-meta">{{$news->content}}</p>
        <hr>
    </article>

    <div>
        <a href="/news">Go back</a>
    </div>
@can('null')
    <form method="POST" action="/news/{{$news->id}}">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete news</button>
    </form>
@endcan

@endsection
