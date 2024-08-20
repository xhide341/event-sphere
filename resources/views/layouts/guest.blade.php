<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'eventsphere') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=McLaren&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-primary antialiased">
        <div class="min-h-screen flex space-x-20 justify-center items-center pt-6 sm:pt-0 bg-alice-blue">
            @if (Route::currentRouteName() === 'register')
                <img src="{{ Vite::asset('resources/images/register-illustration.png') }}" alt="Illustration for Register" class="w-[600px] h-auto">
            @endif
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <div class="flex flex-col items-center justify-center">
                    <a href="/" wire:navigate>
                        <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                    </a>
                    <p class="text-base text-primary font-logo mb-4">eventsphere</p>
                </div>
                {{ $slot }}
            </div>
            @if (Route::currentRouteName() === 'login')
                <img src="{{ Vite::asset('resources/images/login-illustration.png') }}" alt="Illustration for Login" class="w-[800px] h-[520px]">
            @endif
        </div>
    </body>
</html>