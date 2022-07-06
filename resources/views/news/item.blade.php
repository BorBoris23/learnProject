<h3>{{$item->header}}</h3>
<p class="blog-post-meta">{{$item->created_at->toFormattedDateString()}}</p>
<p class="lead mb-0"><a href="/news/{{$item->id}}">go to reading</a></p>
<hr>
