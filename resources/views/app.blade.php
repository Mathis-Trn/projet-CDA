<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bibliothèque de l’Arsenal - @yield('title')</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('scripts')
    </head>
    <body>
        <div id="app-nav-bar">
            <app-navbar></app-navbar>
        </div>
        <div class="container">
            <div id="app">                
                @yield('content')
            </div>
        </div>
        <div id="app-footer">
            <app-footer></app-footer>
        </div>
    </body>
</html>