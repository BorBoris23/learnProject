<div class="col-md-4">
    <div class="position-sticky" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fst-italic">Tags</h4>
            @if($routeName === 'index')
                @include('layout.articlesTags', ['tags' => $articleTagsCloud])
            @elseif($routeName === 'news.index')
                @include('layout.newsTags', ['tags' => $newsTagsCloud])
            @endif
        </div>
    </div>
</div>

