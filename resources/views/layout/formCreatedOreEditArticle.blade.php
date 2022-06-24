<div class="mb-3">
    <label for="exampleInputHeader" class="form-label">Header</label>
    <input type="text" class="form-control" name="header" id="exampleInputHeader" placeholder="Add new header" value="{{old('header', $article->header ?? '') }}">
</div>
<div class="mb-3">
    <label for="exampleInputContent" class="form-label">Content</label>
    <textarea class="form-control" name="content" id="exampleInputContent" placeholder="Add new content">{{old('content', $article->content ?? '' ) }}</textarea>
</div>
<div class="mb-3">
    <label for="exampleInputDescription" class="form-label">Description</label>
    <textarea class="form-control" name="description" id="exampleInputDescription" placeholder="Add short description">{{old('description', $article->description ?? '') }}</textarea>
</div>
@if(isset($article))
    <div class="mb-3">
        <input type="hidden" class="form-control" name="uniqueCode" id="exampleInputUniqueCode" placeholder="Add new unique code" value="{{$article->uniqueCode}}">
    </div>
@else
    <div class="mb-3">
        <label for="exampleInputUniqueCode" class="form-label">Unique code</label>
        <input type="text" class="form-control" name="uniqueCode" id="exampleInputUniqueCode" placeholder="Add new unique code" value="{{old('uniqueCode')}}">
    </div>
@endif

<div class="mb-3">
    <input type="hidden" name="owner_id" value="{{$user->id ?? ''}}">
</div>

@if(in_array('admin', $user->roles()->pluck('name')->toArray()))
    <div class="mb-3 form-check">
        @if(isset($article) && $article->public === 'yes')
            <input type="checkbox" name="public" class="form-check-input" id="exampleCheck" checked>
        @else
            <input type="checkbox" name="public" class="form-check-input" id="exampleCheck">
        @endif
        <label class="form-check-label" for="exampleCheck">published</label>
    </div>
@endif


