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
        <p><a class="text-blue-500 underline" href="{{route('registerForm')}}">RegisterForm</a></p>
        <p><a class="text-blue-500 underline" href="{{route('usersList')}}">UsersList</a></p>
        <p><a class="text-blue-500 underline" href="{{route('listAndRegisterUsers')}}">ListAndRegisterUsers</a></p>
        <p><a class="text-blue-500 underline" href="{{route('todo.index')}}">Todo</a></p>
        <p><a class="text-blue-500 underline" href="{{route('homePage')}}">HomePage</a></p>
        <p><a class="text-blue-500 underline" href="{{route('userPage')}}">UserPage</a></p>
        <p><a class="text-blue-500 underline" href="{{route('testSimplePage', ['user' => 20])}}">TestSimplePage</a></p>
        <p><a class="text-blue-500 underline" href="{{route('contactUs')}}">ContactUs</a></p>
        <p><a class="text-blue-500 underline" href="{{route('modal')}}">Modal</a></p>
        <p><a class="text-blue-500 underline" href="{{route('datatable.usersTable')}}">Datatable/UsersTable</a></p>
        <p><a class="text-blue-500 underline" href="{{route('navigation.aboutUs')}}">Navigation</a></p>
    </body>
</html>
