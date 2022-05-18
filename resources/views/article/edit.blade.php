@extends('layout.master')

@section('content')
    <h2 class="blog-post-title">Edit article</h2>

    @include('layout.errors')

    <form method="POST" action="/article/{{$article->id}}">

        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="exampleInputHeader" class="form-label">Header</label>
            <input type="text" class="form-control" name="header" id="exampleInputHeader" value="{{old('header', $article->header)}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputContent" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="exampleInputContent">{{old('content', $article->content)}}</textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleInputDescription">{{old('description', $article->description)}}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck">
            <label class="form-check-label" for="exampleCheck">published</label>
        </div>
        <button type="submit" class="btn btn-primary">Edit article</button>
    </form>

    <form method="POST" action="/article/{{$article->id}}">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete article</button>
    </form>
@endsection
