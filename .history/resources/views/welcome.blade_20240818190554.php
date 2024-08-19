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
                        </div>
                    </div>
                </section>
            </div>

            <!-- powered by section -->
            <section class="absolute min-w-[50dvw] w-[50dvw] flex space-x-6 items-center justify-center mx-auto text-center py-8 px-16 -mt-12 z-10 relative border-2 border-primary bg-gray-200 shadow-lg rounded-lg">
                <div class="flex space-x-6 items-center justify-center">
                    <h2 class="text-xl font-semibold text-primary">Powered by:</h2>
                    <a href="https://laravel.com" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/laravel-logo.svg') }}" alt="Laravel Logo" class="w-10 h-10">
                    </a>
                    <a href="https://tailwindcss.com" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/tailwind-logo.svg') }}" alt="Tailwind Logo" class="w-10 h-10">
                    </a>
                    <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/javascript-logo.svg') }}" alt="JavaScript Logo" class="w-10 h-10">
                    </a>
                    <a href="https://www.php.net" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/php-logo.svg') }}" alt="PHP Logo" class="w-10 h-10">
                    </a>
                    <a href="https://www.mysql.com" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/mysql-logo.svg') }}" alt="MySQL Logo" class="w-10 h-10">
                    </a>
                    <a href="https://laravel-livewire.com" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/livewire-logo.svg') }}" alt="Livewire Logo" class="w-10 h-10">
                    </a>
                    <a href="https://vitejs.dev" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/vite-js-logo.svg') }}" alt="Vite Logo" class="w-10 h-10">
                    </a>
                    <a href="https://alpinejs.dev" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/alpine-js.svg') }}" alt="Alpine Logo" class="w-10 h-10">
                    </a>
                </div>
            </section>
            
            <div class="relative bg-white">
                <!-- how it all started -->
                 <div class="min-h-[100dvh] w-full flex items-center justify-center">

                 </div>
                 <section id="how-it-all-started">
                    <div class="relative flex flex-col items-center justify-center text-primary tracking-widest mt-10">
                        <h2 class="text-4xl font-bold mb-4">How it all started 🚀</h2>
                        <p class="text-justify text-lg w-[40dvw] mx-auto tracking-normal leading-8 mb-4">
                            Our journey began with a simple idea: to create a platform that connects people through events. 🎉
                            As students, we faced challenges in organizing and promoting events, which inspired us to develop this system. 
                            With teamwork, dedication, and a passion for technology, we transformed our vision into reality. 💻✨
                        </p>
                        <div class="is-hidden avatar text-center flex flex-col items-center justify-center transition-transform duration-300 ease-in-out hover:scale-110">
                            <img src="{{ Vite::asset('resources/images/startup.png') }}" alt="Startup Image" class="h-[200px]">
                            <p class="text-2xl font-bold mt-2">Our Inspiration</p>
                        </div>
                    </div>
                 </section>
                 <!-- meet the team -->
                <section id="meet-the-team">
                    <div class="w-full flex items-center pb-16 justify-center border-b-2 border-gray-200">
                        <div class="relative flex flex-col items-center justify-center text-primary tracking-widest">
                            <h1 class="text-5xl font-bold relative my-16">
                                Meet the <span class="bg-primary text-white px-2">team</span>
                            </h1>
                            <p class="text-justify text-lg w-[40dvw] mx-auto tracking-normal leading-8 mb-16">We are a team of 3 students from <a href="https://www.facebook.com/LaConsolacionU" target="_blank" class="font-bold text-accent">La Consolacion University Philippines</a>, taking up Bachelor of Science in Information Technology. This system is part of our final capstone project.</p>
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
                    <div class="min-h-[80dvh] w-full flex items-center justify-center py-16 border-b-2 border-gray-200">
                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-primary mb-4">Contact Us</h2>
                            <p class="text-lg mb-2">Email: <a href="mailto:info@example.com" class="text-accent">info@example.com</a></p>
                            <p class="text-lg mb-2">Phone: <a href="tel:+1234567890" class="text-accent">+1 (234) 567-890</a></p>
                            <p class="text-lg">Address: 123 Event St, City, Country</p>
                        </div>
                    </div>
                </section>
            </div>

            <!-- footer -->
            <footer class="py-8 text-center text-sm text-primary flex items-center justify-center space-x-2">
                <p>&copy; 2024 eventsphere. All rights reserved.</p>
                <a href="https://github.com/xhide341/event-sphere.git" target="_blank" class="hover:animate-spin-fast transition-transform">
                    <img src="{{ Vite::asset('resources/images/github-logo.svg') }}" alt="GitHub Logo" class="w-8 h-8 inline-block">
                </a>
            </footer>
        </div>
    </body>
</html>