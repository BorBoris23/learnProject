@php
    $tags = $tags ?? collect();
@endphp

@if($tags->isNotEmpty())
    @foreach($tags as $tag)
        <a href="/news/tags/{{$tag->id}}" class="badge bg-secondary">{{$tag->name}}</a>
    @endforeach
@endif
