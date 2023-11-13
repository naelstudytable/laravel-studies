<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles()
</head>

<body class="antialiased bg-gray-100">

    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a wire:navigate.hover href="{{ route('navigation.home') }}"
                            class="{{ Route::is('navigation.home') ? 'underline' : '' }} block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">HOME</a>
                    </li>
                    <li>
                        <a wire:navigate href="{{ route('navigation.aboutUs') }}"
                            class="{{ Route::is('navigation.aboutUs') ? 'underline' : '' }} block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">ABOUT US</a>
                    </li>
                    <li>
                        <a wire:navigate.hover href="{{ route('navigation.terms') }}"
                            class="{{ Route::is('navigation.terms') ? 'underline' : '' }} block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">TERMS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-1/2 sm:w-full mx-auto p-6">
        <div class="p-6 bg-white border-spacing-0 rounded-lg shadow">
            {{ $slot }}
        </div>
    </div>

    @livewireScripts()

</body>

</html>
