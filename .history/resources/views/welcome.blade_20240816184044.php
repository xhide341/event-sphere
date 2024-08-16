<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-poppins">
        <div class="text-black/50 bg-white/10 text-primary min-h-screen">
            <div class="relative min-h-screen flex flex-col">
                <div class="w-full max-w-7xl mx-auto px-6">                                     
                    <header class="py-6 flex items-center justify-between">
                        
                        <p class="font-gloria text-3xl">eventsphere</p>

                        <nav class="flex space-x-16">
                            <a href="" class="text-primary hover:text-accent">Home</a>
                            <a href="" class="text-primary hover:text-accent">About</a>
                            <a href="" class="text-primary hover:text-accent">Contact</a>
                        </nav>

                        @if (Route::has('login'))
                            <livewire:welcome.navigation />
                        @endif
                    </header>
                </div>

                <main class="flex-grow">
                    <div class="flex flex-col items-center justify-center">

                    </div>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </footer>
            </div>
        </div>
    </body>
</html>