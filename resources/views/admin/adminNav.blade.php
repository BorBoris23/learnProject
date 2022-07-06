@extends('layout.without_sidebar')

@section('content')

    <div class="list-group">
        <a href="/admin/feedback" class="list-group-item list-group-item-action">Feedback</a>
        <a href="/admin/articleControl" class="list-group-item list-group-item-action list-group-item-primary">Article control room</a>
        <a href="/admin/newsControl" class="list-group-item list-group-item-action list-group-item-secondary">News control room</a>
        <a href="/admin/createNews" class="list-group-item list-group-item-action list-group-item-success">Create news</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-danger">A simple danger list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-warning">A simple warning list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-info">A simple info list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-light">A simple light list group item</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">A simple dark list group item</a>
    </div>

@endsection

