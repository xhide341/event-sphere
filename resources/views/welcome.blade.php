<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>eventsphere</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=McLaren&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-poppins">
        <div class="relative text-primary bg-alice-blue">
            <div class="relative min-h-screen flex flex-col items-center justify-between bg-landing pb-16 sm:px-0 sm:pb-20">
                <!-- header -->                 
                <div class="w-full flex flex-col justify-center text-white bg-white/10 backdrop-blur shadow-lg mx-auto sm:flex-row">
                    <div class="w-full flex justify-center sm:max-w-7xl">
                        <header class="py-4 space-y-4 flex flex-col items-center justify-between w-screen sm:flex-row sm:p-6 sm:space-y-0">
                            <div class="flex items-center">
                                <img src="{{ Vite::asset('resources/images/LCUP.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                <p class="font-logo text-lg ml-2">eventsphere</p>
                            </div>

                            <nav class="flex flex-row text-base space-x-4 sm:space-y-0 sm:space-x-20">
                                <a href="#home" class="hover:text-white-900 relative group transition-transform duration-100 ease-in-out hover:-rotate-2">
                                    <span class="relative z-10">Home</span>
                                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
                                </a>
                                <a href="#about" class="hover:text-white-900 relative group transition-transform duration-100 ease-in-out hover:-rotate-2">
                                    <span class="relative z-10">About</span>
                                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
                                </a>
                                <a href="#contact" class="hover:text-white-900 relative group transition-transform duration-100 ease-in-out hover:-rotate-2">
                                    <span class="relative z-10">Contact</span>
                                    <span class="absolute left-0 bottom-0 w-full h-0.5 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
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
                    <div class="w-full h-auto text-white flex flex-col items-center text-center sm:px-4">
                        <div class="py-20 flex items-center justify-start text-center">
                                <h1 id="typing-text" class="text-4xl font-bold text-start sm:text-5xl min-w-fit">
                                    <span id="cursor" class="cursor">|</span>
                                </h1>
                        </div>
                    </div>
                </section>
                <!-- benefits section -->
                <section id="benefits">
                    <div class="relative w-full flex flex-col justify-around px-4 space-y-6 mt-auto sm:space-y-0 sm:flex-row sm:space-x-6 sm:w-[80dvw]">
                        <div class="flex flex-col flex-wrap text-center bg-gray-100 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-green-500">✔️</span>
                                <p class="font-bold ml-2 text-normal">Easy Event Management</p>
                            </div>
                            <p class="text-gray-700 text-sm break-words">Streamline the process of organizing events with our user-friendly platform.</p>
                            <div class="flex justify-center mt-2">
                                @for ($i = 0; $i < 5; $i++)
                                    <img src="{{ Vite::asset('resources/images/star.svg') }}" alt="Star" class="w-4 h-4 inline-block" />
                                @endfor
                            </div>
                        </div>
                        <div class="flex flex-col flex-wrap text-center bg-gray-100 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-green-500">✔️</span>
                                <p class="font-bold ml-2 text-normal">Connect with Attendees</p>
                            </div>
                            <p class="text-gray-700 text-sm break-words">Easily connect with participants and keep them informed about event updates.</p>
                            <div class="flex justify-center mt-2">
                                @for ($i = 0; $i < 5; $i++)
                                    <img src="{{ Vite::asset('resources/images/star.svg') }}" alt="Star" class="w-4 h-4 inline-block" />
                                @endfor
                            </div>
                        </div>
                        <div class="flex flex-col flex-wrap text-center bg-gray-100 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-green-500">✔️</span>
                                <p class="font-bold ml-2 text-normal">Analytics and Insights</p>
                            </div>
                            <p class="text-gray-700 text-sm break-words">Gain valuable insights into attendee engagement and event performance.</p>
                            <div class="flex justify-center mt-2">
                                @for ($i = 0; $i < 5; $i++)
                                    <img src="{{ Vite::asset('resources/images/star.svg') }}" alt="Star" class="w-4 h-4 inline-block" />
                                @endfor
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- powered by section -->
            <section id="powered-by">
                <div class="relative w-[90dvw] flex flex-col items-center justify-center mx-auto py-8 px-4 my-8 border-2 border-primary bg-white shadow-lg rounded-lg sm:px-8 sm:-mt-12 sm:z-10 sm:my-0 sm:w-[50dvw] sm:flex-nowrap">
                    <div class="flex flex-wrap space-y-4 space-x-6 items-center justify-center sm:flex-row sm:space-y-0">
                        <h2 class="text-normal font-semibold text-primary sm:text-lg">Powered by:</h2>
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
                        <a href="https://www.html5.org" target="_blank" class="hover:scale-110 transition-transform duration-300">
                            <img src="{{ Vite::asset('resources/images/html5-logo.svg') }}" alt="HTML5 Logo" class="w-10 h-10">
                        </a>
                    </div>
                </div>
            </section>
            
            <!-- how it all started -->
            <section id="how-it-all-started">
                <div class="relative min-h-[70dvh] flex flex-col items-center justify-center text-center w-full pb-10 text-primary tracking-widest px-4 sm:pt-10">
                    <div class="bg-patten-blue p-8 rounded-lg mb-6 sm:p-16">
                        <h2 class="text-2xl font-bold mx-auto sm:text-4xl">
                            <span class="bg-primary text-white px-2">How</span> it all started 🚀
                        </h2>
                        <div class="flex flex-col items-center justify-between space-y-4 pt-6 sm:pt-10 sm:space-y-0 sm:space-x-10 sm:flex-row">
                            <p class="text-justify text-sm w-full mx-auto tracking-normal leading-8 mb-0 h-auto text-center sm:text-normal sm:w-[30dvw] sm:h-[300px]">
                                Our journey began with a simple idea: <span class="text-accent">to create a platform that connects people through events</span>. 
                                As students, we encountered various challenges in organizing and promoting events. 
                                This experience motivated us to develop a solution that simplifies event management. 
                                Through collaboration and innovation, we aimed to enhance the event experience for everyone involved. 
                                With dedication and a passion for technology, we turned our vision into a reality. 💻✨
                            </p>
                            <div class="px-4 mb-0 w-full sm:w-[30dvw]">
                                <iframe class="border rounded-2xl" width="100%" height="300" sandbox="allow-same-origin allow-scripts" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&mute=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                <!-- meet the team -->
            <section id="meet-the-team">
                <div class="min-h-[70dvh] w-full flex flex-col items-center pt-4 pb-8 justify-center bg-alice-blue px-4 sm:pt-8 sm:pb-16">
                    <div class="relative flex flex-col items-center justify-center text-primary tracking-widest">
                        <h1 class="text-2xl font-bold relative mb-6 sm:text-4xl">
                            Meet the <span class="bg-primary text-white px-2">team</span> 👋
                        </h1>
                        <p class="text-justify text-sm w-full mx-auto tracking-normal px-4 leading-8 mb-8 sm:mb-16 sm:w-[40dvw] sm:text-normal">We are a team of 3 students from <a href="https://www.facebook.com/LaConsolacionU" target="_blank" class="text-accent">La Consolacion University Philippines</a>, taking up Bachelor of Science in Information Technology. This system is part of our final capstone project.</p>
                        <div class="flex flex-col sm:flex-row items-center justify-center space-y-4 sm:space-y-0 sm:space-x-20 text-primary text-center">
                            <div class="is-hidden avatar text-center flex flex-col items-center justify-center">
                                <img src="{{ Vite::asset('resources/images/boy1.png') }}" alt="Placeholder Image" class="h-[150px] transition-transform duration-300 ease-in-out hover:scale-110 sm:h-[200px]">
                                <p class="text-lg font-bold mt-2 sm:text-2xl">Shawne Nuque</p>
                                <p class="text-sm">Web Developer</p>
                            </div>
                            <div class="is-hidden avatar text-center flex flex-col items-center justify-center">
                                <img src="{{ Vite::asset('resources/images/girl1.png') }}" alt="Placeholder Image" class="h-[150px] transition-transform duration-300 ease-in-out hover:scale-110 sm:h-[200px]">
                                <p class="text-lg font-bold mt-2 sm:text-2xl">Lorrea Delos Reyes</p>
                                <p class="text-sm">Project Researcher</p>
                            </div>
                            <div class="is-hidden avatar text-center flex flex-col items-center justify-center">
                                <img src="{{ Vite::asset('resources/images/girl2.png') }}" alt="Placeholder Image" class="h-[150px] transition-transform duration-300 ease-in-out hover:scale-110 sm:h-[200px]">
                                <p class="text-lg font-bold mt-2 sm:text-2xl">Pauline Joy Panillo</p>
                                <p class="text-sm">Project Researcher</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact section -->
            <section id="contact">
                <div class="min-h-[70dvh] w-full flex flex-col items-center py-8 px-4 bg-patten-blue sm:py-16">
                    <h1 class="text-2xl font-bold relative mb-6 text-primary sm:text-4xl">
                        <span class="bg-primary text-white px-2">Connect</span> with us 🤝
                    </h1>
                    <div class="mb-6 text-center text-primary sm:mb-10">
                        <p class="text-sm sm:text-base">For inquiries, you can reach us at:</p>
                        <p class="text-sm sm:text-base">Email: <a href="mailto:team@example.com" class="text-accent">team@example.com</a></p>
                        <p class="text-sm sm:text-base">Phone: <a href="tel:+1234567890" class="text-accent">+1 (234) 567-890</a></p>
                    </div>
                    <!-- Contact Form -->
                     <livewire:welcome.contact-form/>
                </div>
            </section>

            <!-- footer -->
            <footer class="py-6 px-4 sm:px-10 mx-auto flex flex-col items-center justify-between text-xs text-primary max-w-screen bg-alice-blue sm:text-sm sm:flex-row">
                <div class="flex items-center">
                    <img src="{{ Vite::asset('resources/images/LCUP.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                    <p class="font-logo text-lg ml-2">eventsphere</p>
                </div>
                <div class="flex items-center space-x-2">
                    <p>&copy; 2024 eventsphere. All rights reserved.</p>
                    <a href="https://github.com/xhide341/event-sphere.git" target="_blank" class="hover:animate-spin-fast transition-transform">
                        <img src="{{ Vite::asset('resources/images/github-logo.svg') }}" alt="GitHub Logo" class="w-8 h-8 inline-block">
                    </a>
                </div>
            </footer>
        </div>
    </body>
</html>