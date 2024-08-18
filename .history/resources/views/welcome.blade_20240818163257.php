<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>eventsphere</title>

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
        <div class="relative text-black/50 text-primary bg-white-500">
            <div class="relative min-h-screen flex flex-col bg-landing">
                <!-- header -->                 
                <div class="w-full flex justify-center bg-white backdrop-blur shadow-lg text-primary">
                    <div class="w-full max-w-7xl px-6">
                        <header class="py-6 flex items-center justify-between w-full">
                            <div class="flex items-center">
                                <img src="{{ Vite::asset('resources/images/eventsphere_logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                <p class="font-gloria text-2xl">eventsphere</p>
                            </div>

                            <nav class="flex space-x-16 text-lg">
                                <a href="#home" class="hover:text-primary relative group transition-transform duration-300 ease-in-out hover:-rotate-2">
                                    <span class="relative z-10">Home</span>
                                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-accent scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
                                </a>
                                <a href="#about" class="hover:text-primary relative group transition-transform duration-300 ease-in-out hover:-rotate-2">
                                    <span class="relative z-10">About</span>
                                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-accent scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
                                </a>
                                <a href="#contact" class="hover:text-primary relative group transition-transform duration-300 ease-in-out hover:-rotate-2">
                                    <span class="relative z-10">Contact</span>
                                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-accent scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
                                </a>
                            </nav>

                            @if (Route::has('login'))
                                <livewire:welcome.navigation />
                            @endif
                        </header>
                    </div>
                </div>
                <!-- home -->
                <section class="#home">
                    <div class="w-full h-full flex items-center justify-center text-white">
                        <div class="py-20">
                            <h1 id="typing-text" class="text-5xl font-bold">
                                <span id="cursor" class="cursor">|</span>
                            </h1>
                            <img src="{{ Vite::asset('resources/images/event_image.png') }}" alt="Placeholder Image" class="mt-4 w-1/2 h-auto">
                        </div>
                    </div>
                </section>
            </div>

            <!-- powered by section -->
            <section class="absolute min-w-[50dvw] w-[50dvw] flex space-x-4 items-center mx-auto text-start py-8 px-16 -mt-12 z-10 relative border-2 border-primary bg-custom-white-900 rounded-lg">
                <h2 class="text-xl font-semibold text-primary">Powered by:</h2>
                <img src="{{ Vite::asset('resources/images/laravel-logo.svg') }}" alt="Laravel Logo" class="w-10 h-10">
                <img src="{{ Vite::asset('resources/images/tailwind-logo.svg') }}" alt="Tailwind Logo" class="w-10 h-10">
                <img src="{{ Vite::asset('resources/images/javascript-logo.svg') }}" alt="JavaScript Logo" class="w-10 h-10">
                <img src="{{ Vite::asset('resources/images/php-logo.svg') }}" alt="PHP Logo" class="w-10 h-10">
                <img src="{{ Vite::asset('resources/images/livewire-logo.svg') }}" alt="Livewire Logo" class="w-10 h-10">
            </section>
            
            <!-- creator section -->
            <div class="relative bg-white">
                <section id="about">
                    <div class="min-h-[65dvh] w-full flex items-center pb-16 justify-center border-b-2 border-gray-200">
                        <div class="relative flex flex-col items-center justify-center space-y-10 text-primary tracking-widest">
                            <h1 class="text-5xl font-bold relative my-10">
                                Meet the <span class="bg-primary text-white px-2">team</span>
                            </h1>
                            <div class="flex flex-row items-center justify-center space-x-20 text-primary text-center">
                                <div class="is-hidden avatar text-center flex flex-col items-center justify-center">
                                    <img src="{{ Vite::asset('resources/images/boy1.png') }}" alt="Placeholder Image" class="h-[200px] transition-transform duration-300 ease-in-out hover:scale-110">
                                    <p class="text-2xl font-bold mt-2">Shawne Nuque</p>
                                    <p class="text-sm">Web Developer</p>
                                </div>
                                <div class="is-hidden avatar text-center flex flex-col items-center justify-center">
                                    <img src="{{ Vite::asset('resources/images/girl1.png') }}" alt="Placeholder Image" class="h-[200px] transition-transform duration-300 ease-in-out hover:scale-110">
                                    <p class="text-2xl font-bold mt-2">Lorrea Delos Reyes</p>
                                    <p class="text-sm">Project Researcher</p>
                                </div>
                                <div class="is-hidden avatar text-center flex flex-col items-center justify-center">
                                    <img src="{{ Vite::asset('resources/images/girl2.png') }}" alt="Placeholder Image" class="h-[200px] transition-transform duration-300 ease-in-out hover:scale-110">
                                    <p class="text-2xl font-bold mt-2">Pauline Joy Panillo</p>
                                    <p class="text-sm">Project Researcher</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- contact section -->
                <section id="contact">
                    <div class="min-h-[40dvh] w-full flex items-center justify-center text-primary">
                        <h1 class="is-hidden text-5xl font-bold">Contact</h1>
                    </div>
                </section>
            </div>

            <!-- footer -->
            <footer class="py-16 text-center text-sm text-black">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </body>
</html>