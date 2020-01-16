<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <title>River Code Test</title>
        <link rel="stylesheet" href="/css/app.css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <div class="push-bottom">
                <navbar></navbar>
                <div class="slider">
                    <h2 class="slider-text">EXAMPLE DEMO</h2>
                    <img class="slider-img img-fluid" src="/media/large-bg-image.jpg">
                </div>
            </div>
            <div class="container">
                <bookings></bookings>
            </div>
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

