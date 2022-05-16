@extends('layout.master')

@section('content')
    <ul class="list-group">
        <h1 class="blog-post-title">Appeals list</h1>

        @foreach($appeals as $appeal)

            @include('appeal.item')

        @endforeach

    </ul>

    <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled">Newer</a>
    </nav>

@endsection
