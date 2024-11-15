<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'eventsphere') }} | {{ ucfirst(Route::currentRouteName()) }}</title>
        <link rel="icon" href="{{ Vite::asset('resources/images/LCUP.ico') }}" type="image/x-icon" sizes="16x16">
        
        <!-- Add Livewire Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-poppins text-primary antialiased">
        <div class="min-h-screen flex">
            <div class="w-1/2 flex justify-center items-center bg-custom-white">
                <div class="flex flex-col items-center justify-center p-4 md:p-6 rounded-lg">
                    @if (Route::currentRouteName() === 'login')
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="text-5xl text-accent font-bold mb-2">Welcome back</h1>
                            <p class="text-gray-600 font-xs">Enter your credentials to sign in.</p>
                        </div>
                    @endif
                    @if (Route::currentRouteName() === 'register')
                        <div class="flex flex-col items-center justify-center">
                            <h1 class="text-5xl text-accent font-bold mb-2">Create an account</h1>
                            <p class="text-gray-600 font-xs">Fill in the form to create an account.</p>
                        </div>
                    @endif

                    <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                        {{ $slot }}
                    </div>
                </div>
            </div>
            @if (Route::currentRouteName() === 'login')
                <div class="fixed top-0 right-0 h-screen w-1/2 hidden sm:block">
                    <img src="{{ Vite::asset('resources/images/guest-images/login-image.jpg') }}" 
                        alt="Illustration for Login" 
                        class="w-full h-full object-cover">
                    <div class="w-full h-full bg-gray-300 animate-pulse"></div>
                </div>
            @endif
        </div>
    </body>
</html>