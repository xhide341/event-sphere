<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'eventsphere') }} | {{ ucfirst(Route::currentRouteName()) }}</title>
        <link rel="icon" href="{{ Vite::asset('resources/images/LCUP.ico') }}" type="image/x-icon" sizes="16x16">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=McLaren&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <!-- Add Livewire Styles -->
        @livewireStyles
    </head>
    <body class="font-poppins antialiased bg-muted-teal">
        <div class="relative flex bg-muted-teal max-w-full w-full">
            
            @livewire('layout.sidebar')
            
            <div class="max-w-full w-full py-4 p-4 xl:py-6 xl:pl-0 xl:pr-6 xl:ml-[280px] overflow-x-hidden">
                <!-- Page Heading -->
                @if (isset($header))
                <header x-data="{ isToggled: false }" @toggle-sidebar.window="isToggled = !isToggled"
                    class="transition-all duration-300 ease-in-out"
                    :class="{ 'ml-64': isToggled, 'ml-0': !isToggled }">
                    <div class="px-4 xl:px-0">
                        {{ $header }}
                    </div>
                </header>
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>            
        </div>
        @livewireScripts
    </body>
</html>
