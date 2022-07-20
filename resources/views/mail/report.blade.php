@component('mail::message')
    @if(isset($data['countArticles']))
        <p>count articles - {{$data['countArticles']}}</p>
    @endif
    @if(isset($data['countNews']))
        <p>count news - {{$data['countNews']}}</p>
    @endif
    @if(isset($data['countUsers']))
        <p>count users - {{$data['countUsers']}}</p>
    @endif
    @if(isset($data['countComments']))
        <p>count comments - {{$data['countComments']}}</p>
    @endif
    @if(isset($data['countTags']))
        <p>count tags - {{$data['countTags']}}</p>
    @endif
@endcomponent







