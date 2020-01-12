<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @extends('includes.header')
    </head>
    <body>
        @yield('content')
    </body>
</html>