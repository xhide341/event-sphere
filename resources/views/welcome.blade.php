<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Welcome! - eventsphere</title>

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
        <div class="relative text-primary bg-gray-100">
            <div class="relative min-h-screen flex flex-col items-center justify-between pb-16 sm:px-0 sm:pb-20">
                <!-- header -->                 
                <div class="fixed top-0 w-full flex flex-col justify-center z-10 text-primary bg-white backdrop-blur shadow-lg mx-auto sm:flex-row">
                    <div class="w-full flex justify-center sm:max-w-7xl" x-data="{ expanded: false }">
                        <header class="p-4 flex items-center justify-between w-screen sm:flex-row md:p-6">
                            <div class="flex items-center">
                                <div class="flex flex-shrink-0 items-center">
                                    <img src="{{ Vite::asset('resources/images/LCUP.png') }}" alt="Logo" class="w-10 h-10 rounded-full">
                                    <p class="font-logo text-md ml-2">{{config('app.name')}}</p>
                                </div>
                            </div>

                            <div class="flex items-center lg:hidden">
                                <button type="button" class="text-gray-900" @click="expanded = !expanded" :aria-expanded="expanded">
                                    <span x-show="!expanded" aria-hidden="true">
                                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                                        </svg>
                                    </span>

                                    <span x-show="expanded" aria-hidden="true" style="display: none;">
                                        <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </span>
                                </button>
                            </div>

                            @if (Route::has('login'))
                                <livewire:welcome.navigation />
                            @endif
                        </header>

                        <!-- Add the expanded menu here, inside the x-data scope -->
                        <nav x-show="expanded" x-cloak class="lg:hidden absolute shadow-lg top-full left-0 right-0 bg-white z-20">
                            <div class="px-4 py-6">
                                <div class="grid gap-y-7">
                                    <a href="#" title="" class="flex items-center p-3 -m-3 text-base font-medium text-gray-900 transition-all duration-200 rounded-xl hover:bg-gray-50 focus:outline-none font-pj focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> Home </a>

                                    <a href="#" title="" class="flex items-center p-3 -m-3 text-base font-medium text-gray-900 transition-all duration-200 rounded-xl hover:bg-gray-50 focus:outline-none font-pj focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> About </a>

                                    <a href="#" title="" class="flex items-center p-3 -m-3 text-base font-medium text-gray-900 transition-all duration-200 rounded-xl hover:bg-gray-50 focus:outline-none font-pj focus:ring-1 focus:ring-gray-900 focus:ring-offset-2"> Contact </a>

                                    <a
                                        href="#"
                                        title=""
                                        class="inline-flex items-center justify-center px-6 py-3 text-base font-bold leading-7 text-white transition-all duration-200 bg-gray-900 border border-transparent rounded-xl hover:bg-gray-600 font-pj focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                        role="button"
                                    >
                                    Register for free
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <!-- home -->
                <section id="home" class="pt-12 sm:pt-20 mt-12 sm:mt-20">
                    <div class="px-4 mx-auto text-center max-w-7xl sm:px-6 lg:px-8">
                        <div class="max-w-3xl mx-auto text-center">
                            <h1 class="px-6 text-lg text-gray-600">Admin Dashboard and Event Management System</h1>
                            <div class="mt-5">
                                <div class="flex items-center justify-start text-center leading-normal">
                                    <h1 id="typing-text" class="text-4xl font-bold text-accent sm:text-5xl lg:text-6xl">
                                        <span id="cursor" class="cursor">|</span>
                                    </h1>
                                </div>
                            </div>
                            <div class="px-8 sm:items-center sm:justify-center sm:px-0 sm:space-x-5 sm:flex mt-9">
                                <a
                                    href="#"
                                    title=""
                                    class="inline-flex items-center justify-center w-full px-8 py-3 text-lg font-semibold text-white transition-all duration-200 bg-accent border-2 border-transparent sm:w-auto rounded-xl hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900"
                                    role="button"
                                >
                                   Register now
                                </a>
                                <a
                                    href="#"
                                    title=""
                                    class="inline-flex items-center justify-center w-full px-6 py-3 mt-4 text-lg font-semibold text-gray-900 transition-all duration-200 border-2 border-gray-400 sm:w-auto sm:mt-0 rounded-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 hover:bg-gray-900 focus:bg-gray-900 hover:text-white focus:text-white hover:border-gray-900 focus:border-gray-900"
                                    role="button"
                                >
                                <svg class="w-5 h-5 mr-2" viewBox="0 0 18 18" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                    d="M8.18003 13.4261C6.8586 14.3918 5 13.448 5 11.8113V5.43865C5 3.80198 6.8586 2.85821 8.18003 3.82387L12.5403 7.01022C13.6336 7.80916 13.6336 9.44084 12.5403 10.2398L8.18003 13.4261Z"
                                    stroke-width="2"
                                    stroke-miterlimit="10"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    />
                                </svg>
                                    Watch free demo
                                </a>
                            </div>
                            <p class="mt-8 text-sm text-gray-500">This website is not affiliated with the official campus of La Consolacion University Philippines.</p>
                        </div>
                    </div>
                    <div class="pt-12">
                        <div class="relative">
                            <div class="absolute inset-0 h-2/3 bg-gray-50"></div>
                            <div class="relative mx-auto">
                                <div class="lg:max-w-6xl lg:mx-auto">
                                    <img src="{{ Vite::asset('resources/images/bg-image-lcup.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>                        
                </section>
            </div>

            <section class="py-10 sm:py-16 lg:py-24">
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div class="max-w-2xl mx-auto text-center">
                        <h2 class="text-3xl font-bold leading-tight text-accent sm:text-4xl lg:text-5xl">How does it work?</h2>
                        <p class="max-w-lg mx-auto mt-4 text-base leading-relaxed text-gray-600">Below are the simple steps to get you started.</p>
                    </div>

                    <div class="relative mt-12 lg:mt-20">
                        <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">
                        <svg width="875" height="48" viewBox="0 0 875 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 29C20.2154 33.6961 38.9915 35.1324 57.6111 37.5555C80.2065 40.496 102.791 43.3231 125.556 44.5555C163.184 46.5927 201.26 45 238.944 45C312.75 45 385.368 30.7371 458.278 20.6666C495.231 15.5627 532.399 11.6429 569.278 6.11109C589.515 3.07551 609.767 2.09927 630.222 1.99998C655.606 1.87676 681.208 1.11809 706.556 2.44442C739.552 4.17096 772.539 6.75565 805.222 11.5C828 14.8064 850.34 20.2233 873 24" stroke="#035AA6" stroke-width="3" stroke-linecap="round" stroke-dasharray="1 12"/>
                        </svg>
                        </div>

                        <div class="relative grid grid-cols-1 text-center gap-y-12 md:grid-cols-3 gap-x-12">
                            <div>
                                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-accent rounded-full shadow">
                                    <span class="text-xl font-semibold text-gray-700"> 1 </span>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold leading-tight text-black md:mt-10">Create a free account</h3>
                                <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            </div>

                            <div>
                                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-accent rounded-full shadow">
                                    <span class="text-xl font-semibold text-gray-700"> 2 </span>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold leading-tight text-black md:mt-10">Build your website</h3>
                                <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            </div>

                            <div>
                                <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white border-2 border-accent rounded-full shadow">
                                    <span class="text-xl font-semibold text-gray-700"> 3 </span>
                                </div>
                                <h3 class="mt-6 text-xl font-semibold leading-tight text-black md:mt-10">Release & Launch</h3>
                                <p class="mt-4 text-base text-gray-600">Amet minim mollit non deserunt ullamco est sit aliqua dolor do amet sint. Velit officia consequat duis enim velit mollit.</p>
                            </div>
                        </div>
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