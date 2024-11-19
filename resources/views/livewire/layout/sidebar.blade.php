<div x-data="{ isToggled: false }" 
    @toggle-sidebar.window="isToggled = !isToggled"
    :class="{ 'translate-x-0': isToggled, '-translate-x-full': !isToggled }"
    class="fixed flex flex-col bg-white z-50 w-64 px-6 py-10 h-full shadow-xl transform transition-transform ease-in-out -translate-x-full xl:translate-x-0">
    <div class="mx-auto flex align-center justify-center space-x-2">
        <x-application-logo class="w-auto h-6 sm:h-7"/>
        <span class="text-primary text-base font-logo">{{ config('app.name') }}</span>
    </div>

    <div class="flex flex-col items-center mt-6 -mx-2">
        @if($avatarUrl)
            <img class="object-cover w-24 h-24 mx-2 rounded-full border-2 border-primary" src="{{ $avatarUrl }}" alt="avatar">
        @else
            <div class="w-24 h-24 mx-2 rounded-full bg-gray-200 border-2 border-primary flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </div>
        @endif
        <h4 class="mx-2 mt-2 font-medium text-primary" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"></h4>
        <p class="mx-2 mt-1 text-sm font-medium text-gray-600">{{ auth()->user()->email }}</p>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            <a wire:navigate href="/events" 
                class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('events') ? 'text-gray-200 bg-primary active:bg-primary focus:bg-primary' : 'text-primary' }} transform rounded-md hover:bg-primary hover:text-gray-200 active:text-white">
                <x-heroicon-s-calendar-days class="w-5 h-5" />
                <span class="mx-4 font-medium text-base">Events</span>
            </a>

            <a wire:navigate href="/profile" 
                class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('profile') ? 'text-gray-200 bg-primary active:bg-primary focus:bg-primary' : 'text-primary' }} transform rounded-md hover:bg-primary hover:text-gray-200 active:text-white">
                <x-heroicon-s-user class="w-5 h-5" />
                <span class="mx-4 font-medium text-base">Profile</span>
            </a>

            <a wire:navigate href="/venues" 
                class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('venues') ? 'text-gray-200 bg-primary active:bg-primary focus:bg-primary' : 'text-primary' }} transform rounded-md hover:bg-primary hover:text-gray-200 active:text-white">
                <x-heroicon-s-building-office class="w-5 h-5" />
                <span class="mx-4 font-medium text-base">Venues</span>
            </a>

            <a wire:navigate href="/speakers" 
                class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('speakers') ? 'text-gray-200 bg-primary active:bg-primary focus:bg-primary' : 'text-primary' }} transform rounded-md hover:bg-primary hover:text-gray-200 active:text-white">
                <x-heroicon-s-users class="w-5 h-5" />
                <span class="mx-4 font-medium text-base">Speakers</span>
            </a>
            <a wire:navigate href="/settings" 
                class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('settings') ? 'text-gray-200 bg-primary active:bg-primary focus:bg-primary' : 'text-primary' }} transform rounded-md hover:bg-primary hover:text-gray-200 active:text-white">
                <x-heroicon-s-cog-6-tooth class="w-5 h-5" />
                <span class="mx-4 font-medium text-base">Settings</span>
            </a>
        </nav>
    </div>
</div>
