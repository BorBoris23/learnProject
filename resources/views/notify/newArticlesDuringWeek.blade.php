@component('mail::message')
# Hi {{$user->name}}
@if(!$articles->isEmpty())
    All new posts in the last week
    @foreach($articles as $article)
        Created new article: {{$article->header}}
    @endforeach
@else
    No new articles
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
