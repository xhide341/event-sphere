<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans">
        <div class=" text-black/50 bg-white text-primary">
            <div class="relative min-h-screen flex flex-col">
                <div class="w-full max-w-7xl mx-auto px-6">                    
                    <header class="py-6 flex items-center justify-between">
                        <div class="logo">
                            <!-- Add your logo here, for example: -->
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
                        </div>
                        
                        <nav class="flex space-x-6">
                            <a href="{{ route('home') }}" class="text-primary hover:text-accent">Home</a>
                            <a href="{{ route('about') }}" class="text-primary hover:text-accent">About</a>
                            <a href="{{ route('contact') }}" class="text-primary hover:text-accent">Contact</a>
                        </nav>

                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>
                </div>

                <main class="flex-grow">
                    <div class="flex flex-col items-center justify-center">
                        <h1 class="text-4xl font-bold">
                            Laravel
                        </h1>
                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </body>
</html>
