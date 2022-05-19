@extends('layout.master')

@section('content')
    <h2 class="blog-post-title">Create article</h2>

    @include('layout.errors')


    <form method="POST" action="/article">

        @csrf

        @include('layout.formCreatedOreEditArticle')

        <button type="submit" class="btn btn-primary">Create article</button>
    </form>

@endsection


