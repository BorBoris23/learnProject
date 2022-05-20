@foreach($article->tags as $tag)
    <a href="#" class="badge bg-secondary">{{$tag->name}}</a>
@endforeach
