@extends('layout.master')

@section('content')
    <h2 class="blog-post-title">Create article</h2>

    @include('layout.errors')

    <form method="POST" action="/article">

        @csrf

        <div class="mb-3">
            <label for="exampleInputHeader" class="form-label">Header</label>
            <input type="text" class="form-control" name="header" id="exampleInputHeader" placeholder="Add new header">
        </div>
        <div class="mb-3">
            <label for="exampleInputContent" class="form-label">Content</label>
            <textarea class="form-control" name="content" id="exampleInputContent" placeholder="Add new content"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputDescription" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="exampleInputDescription" placeholder="Add short description"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck">
            <label class="form-check-label" for="exampleCheck">published</label>
        </div>
        <button type="submit" class="btn btn-primary">Create article</button>
    </form>

@endsection
