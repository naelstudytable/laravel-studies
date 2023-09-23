<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">

        <p><a class="text-blue-500 underline" href="{{route('clicker')}}">Clicker</a></p>
        <p><a class="text-blue-500 underline" href="{{route('registerForm')}}">registerForm</a></p>
        <p><a class="text-blue-500 underline" href="{{route('usersList')}}">usersList</a></p>
        <p><a class="text-blue-500 underline" href="{{route('listAndRegisterUsers')}}">listAndRegisterUsers</a></p>
        <p><a class="text-blue-500 underline" href="{{route('homePage')}}">homePage</a></p>
        <p><a class="text-blue-500 underline" href="{{route('userPage')}}">userPage</a></p>
        <p><a class="text-blue-500 underline" href="{{route('testSimplePage', ['user' => 20])}}">testSimplePage</a></p>
        <p><a class="text-blue-500 underline" href="{{route('contactUs')}}">contactUs</a></p>
    </body>
</html>
