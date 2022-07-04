@foreach($comments as $comment)
    <div class="col-md-2">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <p class="mb-auto">{{$comment->commentText}}</p>
                <div class="mb-1 text-muted">{{$comment->owner->name}}</div>
                <div class="mb-1 text-muted">{{$comment->created_at}}</div>
            </div>
        </div>
    </div>
@endforeach


