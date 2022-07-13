@if($routName === 'article.create')
    <div class="mb-3">
        <input type="hidden" name="owner_id" value="{{$authUser->id}}">
    </div>
@else
    <div class="mb-3">
        <input type="hidden" name="owner_id" value="{{$article->owner->id}}">
    </div>
    @can('isAdmin', $authUser)
        <div class="mb-3 form-check">
            @if(isset($article) && $article->public === 1)
                <input type="checkbox" name="public" class="form-check-input" id="exampleCheck" checked>
            @else
                <input type="checkbox" name="public" class="form-check-input" id="exampleCheck">
            @endif
            <label class="form-check-label" for="exampleCheck">published</label>
        </div>
    @endcan
@endif




