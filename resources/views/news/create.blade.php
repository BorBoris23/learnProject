@extends('layout.without_sidebar')

@section('content')
    <h2 class="blog-post-title">Create article</h2>

    <form method="POST" action="/news">

        @csrf

        <div class="mb-3">
            <label for="exampleInputHeader" class="form-label">Header</label>
            <input type="text" class="form-control" name="header" id="exampleInputHeader" placeholder="Add new header" value="{{old('header') }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputContent" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="exampleInputContent" placeholder="Add new content">{{old('content') }}</textarea>
        </div>
        @if(isset($news))
            <div class="mb-3">
                <label for="exampleInputHeader" class="form-label">Tags</label>
                <input type="text" class="form-control" name="tags" id="exampleInputHeader" placeholder="Add new tag" value="{{old('tags', $news->tags->pluck('name')->implode(',') ?? '') }}">
            </div>
        @else
            <div class="mb-3">
                <label for="exampleInputHeader" class="form-label">Tags</label>
                <input type="text" class="form-control" name="tags" id="exampleInputHeader" placeholder="Add new tag" value="{{old('tags')}}">
            </div>
        @endif
        <button type="submit" class="btn btn-primary">Create news</button>
    </form>

@endsection
