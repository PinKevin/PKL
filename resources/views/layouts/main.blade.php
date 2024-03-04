<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link type="image/png" href="{{ asset('img/logo.png') }}" rel="icon" sizes="16X16">
        <title>@yield('page_title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>

    <body class="bg-white">
        @yield('body')
        @stack('scripts')
    </body>

</html>
