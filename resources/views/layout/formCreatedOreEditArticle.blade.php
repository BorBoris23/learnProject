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
<div class="mb-3">
    <label for="exampleInputTags" class="form-label">Teg</label>
    <input type="text" class="form-control" name="tags" id="exampleInputTags" placeholder="Add new tag" value="{{old('teg', $article->tags->pluck('name')->implode(',') ?? '') }}">
</div>
<div class="mb-3">
    <label for="exampleInputUniqueCode" class="form-label">Unique code</label>
    <input type="text" class="form-control" name="uniqueCode" id="exampleInputUniqueCode" placeholder="Add unique code" value="{{old('uniqueCode', $article->uniqueCode ?? '') }}">
</div>
<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck">
    <label class="form-check-label" for="exampleCheck">published</label>
</div>

