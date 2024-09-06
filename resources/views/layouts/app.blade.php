<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="{{ Vite::asset('resources/images/LCUP.ico') }}" type="image/x-icon" sizes="16x16">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=McLaren&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins antialiased">
        <div class="flex bg-[#91AAB4] min-w-screen">
            
            <div>
                <livewire:layout.sidebar/>
            </div>
            
            <div class="w-screen py-2 p-2 xl:py-4 2xl:pr-4 2xl:ml-72">
                <!-- Page Heading -->
                @if (isset($header))
                <header x-data="{ isToggled: false }" @toggle-sidebar.window="isToggled = !isToggled"
                    class="transition-all duration-300 ease-in-out"
                    :class="{ 'pl-72': isToggled, 'pl-0': !isToggled }">
                    <div class="mx-auto px-4">
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
    </body>
</html>