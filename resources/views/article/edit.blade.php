@extends('layout.master')

@section('content')
    <h2 class="blog-post-title">Edit article</h2>

    @include('layout.errors')

    <form method="POST" action="/article/{{$article->id}}">

        @csrf
        @method('PATCH')
        @include('layout.formCreatedOreEditArticle')


        <button type="submit" class="btn btn-primary">Edit article</button>
    </form>

    <form method="POST" action="/article/{{$article->id}}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete article</button>
    </form>
@endsection
