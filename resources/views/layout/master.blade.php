<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>BlogSite 2.0</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
              rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="/css/app.css" rel="stylesheet" type="text/css" >
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>

    <body>

        @include('layout.nav')

        <main class="container">
            <div class="row g-5">
                <div class="col-md-8">

                    @yield('content')

                </div>

                @include('layout.sidebar')

            </div>
        </main>

        @include('layout.footer')

    </body>

</html>
