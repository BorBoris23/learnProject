@extends('layout.without_sidebar')
@section('content')

<form method="POST">

    @csrf

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="articles" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Add articles report
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="news" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Add news report
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="users" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Add users report
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="comments" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Add comments report
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="tags" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            Add tags report
        </label>
    </div>

{{--    <button type="submit"><a class="btn btn-primary" href="mail/report">Generate a report</a></button>--}}
    <button type="submit">Generate a report</button>

</form>

<a class="btn btn-primary" href="/mail/report">Generate a report</a>

@endsection

