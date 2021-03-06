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
        <label for="exampleInputHeader" class="form-label">Tags</label>
        <input type="text" class="form-control" name="tags" id="exampleInputHeader" placeholder="Add new tag" value="{{old('tags', $article->tags->pluck('name')->implode(',') ?? '') }}">
    </div>
    <div class="mb-3">
        <input type="hidden" class="form-control" name="uniqueCode" id="exampleInputUniqueCode" placeholder="Add new unique code" value="{{$article->uniqueCode}}">
    </div>
@else
    <div class="mb-3">
        <label for="exampleInputHeader" class="form-label">Tags</label>
        <input type="text" class="form-control" name="tags" id="exampleInputHeader" placeholder="Add new tag" value="{{old('tags')}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputUniqueCode" class="form-label">Unique code</label>
        <input type="text" class="form-control" name="uniqueCode" id="exampleInputUniqueCode" placeholder="Add new unique code" value="{{old('uniqueCode')}}">
    </div>
@endif

@include('layout.publicInput')









