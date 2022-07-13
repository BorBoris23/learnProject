@extends('layout.master')

@section('content')

        <article class="blog-post">
            <h2 class="blog-post-title">{{$article->header}}</h2>
            <p class="blog-post-meta">{{$article->created_at}}</p>
            <p>Author - User</p>
            <p>{{$article->content}}</p>
            @include('layout.articlesTags', ['tags' => $article->tags])
            <hr>
            @include('comment.show', ['comments' => $article->comments()->get()])
            <hr>
        </article>

        <form method="POST" action="/article/{{$article->id}}">
            @csrf
            <div class="mb-3">
                <label for="exampleCommentText" class="form-label">Comment</label>
                <textarea class="form-control" name="commentText" id="exampleCommentText" placeholder="Add new comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add comment</button>
        </form>

        <hr>

        @forelse($article->history as $history)
            <p>{{ $history->email }} - {{ $history->pivot->created_at->diffForHumans() }} - {{ $history->pivot->before }} - {{ $history->pivot->now }}</p>
        @empty
            <p>no history</p>
        @endforelse

        @can('update', $article)
            <div>
                <a href="/article/{{$article->id}}/edit">Go to edit article</a>
            </div>
        @endcan

        <div>
            <a href="/">Go back to the main page</a>
        </div>

@endsection

