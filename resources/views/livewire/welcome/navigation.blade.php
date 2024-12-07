<nav class="hidden lg:ml-auto lg:flex lg:items-center lg:space-x-10">
    @auth
        <a href="{{ url('/events') }}"
            class="rounded-md px-3 py-2 text-white ring-none bg-primary transition hover:bg-primary-light">
            Browse Events
        </a>
    @else
        <a href="{{ route('login') }}"
            class="text-primary font-medium relative group transition-transform duration-100 ease-in-out hover:-rotate-2">
            <span class="relative z-10">Log in</span>
            <span
                class="absolute left-0 bottom-0 w-full h-0.5 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
        </a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="text-white relative px-3 py-2 rounded-md bg-primary hover:bg-primary-light">
                <span class="relative z-10">Register for free</span>
            </a>
        @endif
    @endauth
</nav>