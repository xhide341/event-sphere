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
        <div class="relative text-primary bg-white">
            <div class="relative min-h-screen flex flex-col items-center justify-between bg-landing border-b-2 border-gray-200 pb-20">
                <!-- header -->                 
                <div class="w-full flex justify-center bg-white backdrop-blur shadow-lg text-primary">
                    <div class="w-full max-w-7xl px-6">
                        <header class="py-6 flex items-center justify-between w-full">
                            <div class="flex items-center">
                                <img src="{{ Vite::asset('resources/images/eventsphere_logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                <p class="font-logo text-2xl">eventsphere</p>
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
                    <div class="text-white">
                        <div class="py-20">
                                <h1 id="typing-text" class="text-5xl font-bold">
                                    <span id="cursor" class="cursor">|</span>
                                </h1>
                        </div>
                    </div>
                </section>
                <!-- benefits section -->
                <section id="benefits" class="mt-auto">
                    <div class="flex justify-around gap-4">
                        <div class="benefit-block text-center bg-gray-100 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-green-500">✔️</span>
                                <p class="font-bold ml-2">Easy Event Management</p>
                            </div>
                            <p class="text-gray-700">Streamline the process of organizing events with our user-friendly platform.</p>
                            <div class="flex justify-center mt-2">
                                {{ '★ ★ ★ ★ ★' }}
                            </div>
                        </div>
                        <div class="benefit-block text-center bg-gray-100 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-green-500">✔️</span>
                                <p class="font-bold ml-2">Connect with Attendees</p>
                            </div>
                            <p class="text-gray-700">Easily connect with participants and keep them informed about event updates.</p>
                            <div class="flex justify-center mt-2">
                                {{ '★ ★ ★ ★ ★' }}
                            </div>
                        </div>
                        <div class="benefit-block text-center bg-gray-100 p-4 rounded-lg shadow-md">
                            <div class="flex items-center justify-center mb-2">
                                <span class="text-green-500">✔️</span>
                                <p class="font-bold ml-2">Analytics and Insights</p>
                            </div>
                            <p class="text-gray-700">Gain valuable insights into attendee engagement and event performance.</p>
                            <div class="flex justify-center mt-2">
                                {{ '★ ★ ★ ★ ★' }}
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <!-- powered by section -->
            <section class="absolute min-w-[50dvw] w-[50dvw] flex space-x-6 items-center justify-center mx-auto text-center py-8 px-16 -mt-12 z-10 relative border-2 border-primary bg-white shadow-lg rounded-lg">
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
                    <a href="https://www.html5.org" target="_blank" class="hover:scale-110 transition-transform duration-300">
                        <img src="{{ Vite::asset('resources/images/html5-logo.svg') }}" alt="HTML5 Logo" class="w-10 h-10">
                    </a>
                </div>
            </section>
            
            <div class="relative bg-white">
                <!-- how it all started -->
                 <section id="how-it-all-started">
                    <div class="relative min-h-[70dvh] flex flex-col items-center justify-center text-center w-full pt-10 text-primary tracking-widest">
                        <div class="bg-gray-200 p-16 rounded-lg mb-6">
                            <h2 class="text-4xl font-bold mx-auto">
                                <span class="bg-primary text-white px-2">How</span> it all started 🚀
                            </h2>
                            <div class="flex items-center">
                                <p class="text-justify text-lg w-[30dvw] mx-auto tracking-normal leading-8 mb-12">
                                    Our journey began with a simple idea: <span class="text-accent">to create a platform that connects people through events</span>. 
                                    As students, we encountered various challenges in organizing and promoting events. 
                                    This experience motivated us to develop a solution that simplifies event management. 
                                    Through collaboration and innovation, we aimed to enhance the event experience for everyone involved. 
                                    With dedication and a passion for technology, we turned our vision into a reality. 💻✨
                                </p>
                                <div class="border rounded-lg p-4 mb-4">
                                    <img src="path/to/placeholder-image.png" alt="TBD" class="w-[40dvw] h-[300px] rounded-lg">
                                    <p class="text-center text-sm text-gray-500">TBD</p>
                                </div>
                            </div>
                        </div>
                    </div>
                 </section>
                 <!-- meet the team -->
                <section id="meet-the-team">
                    <div class="min-h-[70dvh] w-full flex flex-col items-center py-16 pb-16 justify-center border-b-2 border-gray-200">
                        <div class="relative flex flex-col items-center justify-center text-primary tracking-widest">
                            <h1 class="text-4xl font-bold relative mb-6">
                                Meet the <span class="bg-primary text-white px-2">team</span> 👋
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
                    <div class="min-h-[70dvh] w-full flex flex-col items-center py-16 border-b-2 border-gray-200">
                        <h1 class="text-4xl font-bold relative mb-6">
                            <span class="bg-primary text-white px-2">Connect</span> with us 🤝
                        </h1>
                        <div class="mb-10 text-center">
                            <p class="text-base">For inquiries, you can reach us at:</p>
                            <p class="text-base">Email: <a href="mailto:team@example.com" class="text-accent">team@example.com</a></p>
                            <p class="text-base">Phone: <a href="tel:+1234567890" class="text-accent">+1 (234) 567-890</a></p>
                        </div>
                        <!-- Contact Form -->
                        <form class="w-full max-w-md" action="mailto:team@example.com" method="post" enctype="text/plain">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-sm mb-2" for="name">Name</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm mb-2" for="email">Email</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-sm mb-2" for="message">Message</label>
                                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32" id="message" placeholder="Enter your message" required></textarea>
                            </div>
                            <div class="flex items-center justify-center">
                                <button class="min-w-fit w-32 bg-primary hover:bg-accent text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" onclick="this.form.action='mailto:team@example.com?subject=' + document.getElementById('name').value + ' - [some other subject details]&body=' + document.getElementById('message').value;">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <!-- footer -->
            <footer class="py-6 flex items-center justify-between text-sm text-primary w-full max-w-7xl px-6 mx-auto">
                <div class="flex items-center">
                    <img src="{{ Vite::asset('resources/images/eventsphere_logo.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
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