@extends('layout.without_sidebar')

@section('content')
    @include('layout.errors')

    <form method="POST" action="/contact">

        @csrf

        <div class="mb-3">
            <label for=email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Add you email">
        </div>
        <div class="mb-3">
            <label for="appeal" class="form-label">Appeal text</label>
            <textarea class="form-control" name="appealText" id="appeal" placeholder="Add you appeal"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send an appeal</button>
    </form>

@endsection

