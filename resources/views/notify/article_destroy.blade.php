@component('mail::message')
    # Delete article: {{$article->header}}

    {{$article->content}}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
