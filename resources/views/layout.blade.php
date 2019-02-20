<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <title>@yield('title')</title>
    </head>
    <body>
        @include('partials.header')

        <div class="container">
            @include('partials.alerts')
            <div class="content">
                @yield('content')
            </div>
        </div>

        @include('partials.footer')

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
