<h3>{{$article->header}}</h3>
<p class="blog-post-meta">{{$article->created_at->toFormattedDateString()}}, by <a href="#">{{$article->owner->name}}</a></p>
<p>{{$article->description}}</p>
@include('layout.articlesTags', ['tags' => $article->tags])
<p class="lead mb-0"><a href="/article/{{$article->id}}">go to reading</a></p>
<hr>
