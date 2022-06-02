@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    @foreach($tags as $tag)
        <a href="/articles/tags/{{$tag->name}}" class="badge bg-secondary">{{$tag->name}}</a>
    @endforeach
@endif


