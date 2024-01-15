<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <link type="image/x-icon" href="{{ asset('img/btn-logo.png') }}" rel="icon"> --}}
        <title>@yield('page_title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>

    <body>
        @yield('body')
        @stack('scripts')
    </body>

</html>
