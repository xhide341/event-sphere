<nav class="flex flex-row items-center justify-between space-x-4 text-white-900 sm:space-x-10 sm:space-y-0">
    @auth
        <a
            href="{{ url('/dashboard') }}"
            class="rounded-md px-3 py-2 text-white ring-none bg-primary transition"
        >
            Dashboard
        </a>
    @else
        <a
            href="{{ route('login') }}"
            class="hover:text-white relative group transition-transform duration-100 ease-in-out hover:-rotate-2"
        >
            <span class="relative z-10">Log in</span>   
            <span class="absolute left-0 bottom-0 w-full h-0.5 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out origin-left"></span>
        </a>

        @if (Route::has('register'))
            <a
                href="{{ route('register') }}"
                class="hover:text-white relative ring-1 ring-primary px-3 py-2 rounded-md bg-primary"
            >
                <span class="relative z-10">Register for free</span>
            </a>
        @endif
    @endauth
</nav>
