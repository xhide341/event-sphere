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
            @if (Route::currentRouteName() === 'register' || Route::currentRouteName() === 'login')                
        <div class="w-full px-6 md:px-0 md:w-1/2 flex justify-center items-center bg-patten-blue">
                    <div class="flex flex-col items-center justify-center shadow-lg md:shadow-none bg-white md:bg-transparent p-4 md:p-6 rounded-lg">
                        @if (Route::currentRouteName() === 'login')
                            <div class="flex flex-col items-center justify-center">
                                <h1 class="lg:text-5xl md:text-4xl text-2xl text-accent font-bold mb-2">Welcome back</h1>
                                <p class="md:text-base text-sm text-gray-600 font-xs">Enter your credentials to sign in.</p>
                            </div>
                        @elseif (Route::currentRouteName() === 'register')
                            <div class="flex flex-col items-center justify-center">
                                <h1 class="lg:text-5xl md:text-4xl text-2xl text-accent font-bold mb-2">Create an account</h1>
                                <p class="md:text-base text-sm text-gray-600 font-xs">Fill in the form to create an account.</p>
                            </div>                    
                        @endif
                        
                        <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg z-10">
                            {{ $slot }}
                        </div>
                        
                        <div class="mt-16">
                            @if (Route::currentRouteName() === 'login' || Route::currentRouteName() === 'register')
                                <footer class="text-center text-sm text-gray-600">
                                    By continuing, you agree to eventsphere's 
                                <a href="#" class="text-accent hover:underline">terms of service</a> and 
                                    <a href="#" class="text-accent hover:underline">privacy policy</a>.
                                </footer>
                            @endif
                        </div>
                    </div>
                </div>
            @else
                <!-- Centered layout -->
                <div class="w-full px-6 md:px-0 flex justify-center items-center custom-bg shadow-md">
                    <!-- Back Button -->
                    @if (Route::currentRouteName() === 'password.request')
                        <a href="{{ route('login') }}" 
                           class="absolute top-4 left-4 p-2 text-gray-600 hover:text-accent transition-colors duration-200"
                           wire:navigate
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                 fill="none" 
                                 viewBox="0 0 24 24" 
                                 stroke-width="1.5" 
                                 stroke="currentColor" 
                                 class="w-6 h-6"
                            >
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" 
                                />
                            </svg>
                        </a>
                    @endif

                    <div class="flex flex-col items-center justify-center shadow-lg md:shadow-none bg-white p-4 md:p-6 rounded-lg">
                        @if (Route::currentRouteName() === 'password.request')
                            <div class="flex flex-col items-center justify-center">
                                <h1 class="md:text-3xl text-2xl text-accent font-bold mb-2">Reset Password</h1>                                
                            </div>
                        @endif
                        <div class="w-full sm:max-w-md px-6 py-4 overflow-hidden sm:rounded-lg z-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            @endif

            <!-- Image section -->
            <div class="fixed top-0 right-0 h-screen w-1/2 hidden md:block">
                @if (Route::currentRouteName() === 'login' || Route::currentRouteName() === 'register')
                    <img src="{{ Vite::asset('resources/images/guest-images/login-image.jpg') }}" 
                        alt="Illustration for {{ Route::currentRouteName() === 'login' ? 'Login' : 'Register' }}" 
                        loading="lazy"
                        x-data="{ loaded: false }"
                        x-init="
                            const img = new Image();
                            img.onload = () => loaded = true;
                            img.src = $el.src;
                        "
                        :class="{ 'opacity-0': !loaded, 'opacity-100': loaded }"
                        class="w-full h-full object-cover transition-opacity duration-300">
                    <div x-show="!loaded" class="w-full h-full bg-gray-300 animate-pulse"></div>
                @endif
            </div>
        </div>
    </body>
</html>