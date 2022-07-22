<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>BlogSite 2.0</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet" type="text/css" >
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>

        @include('layout.nav')

        <main class="container">
            <div class="row g-5">
                <div class="col-md-8">

                    @yield('content')

                </div>

                @section('sidebar')
                    @include('layout.sidebar')
                @show

            </div>
        </main>

        @include('layout.footer')

    </body>

</html>
