@component('mail::message')
    # Created new article: {{$article->header}}

    {{$article->content}}

    @component('mail::button', ['url' => '/article/' . $article->id])
        Look article
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
