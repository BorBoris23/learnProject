@component('mail::message')
    # Edit article: {{$article->header}}

    {{$article->content}}

    @component('mail::button', ['url' => '/article/' . $article->id])
        Look article
    @endcomponent

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
