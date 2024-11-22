<div x-data="{ isToggled: false }" 
    @toggle-sidebar.window="isToggled = !isToggled"
    :class="{ 'translate-x-0': isToggled, '-translate-x-full': !isToggled }"
    class="fixed flex flex-col bg-white z-50 w-64 px-6 py-10 h-full shadow-2xl transform transition-transform ease-in-out -translate-x-full xl:translate-x-0">
    <div class="mx-auto flex align-center justify-center space-x-2">
        <x-application-logo class="w-auto h-6 sm:h-7"/>
        <span class="text-primary text-base font-logo">{{ config('app.name') }}</span>
    </div>

    <div class="flex flex-col items-center mt-6 -mx-2">
        @if($avatarUrl)
            <img class="object-cover w-24 h-24 mx-2 rounded-full border-2 border-gray-500" src="{{ $avatarUrl }}" alt="avatar">
        @else
            <div class="w-24 h-24 mx-2 rounded-full bg-gray-200 border-2 border-primary flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </div>
        @endif
        <h4 class="mx-2 mt-2 font-medium text-primary" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"></h4>
        <p class="mx-2 mt-1 text-sm font-sm text-gray-600">{{ auth()->user()->email }}</p>
    </div>

    <div class="flex flex-col justify-between flex-1 mt-6">
        <nav>
            @php
                $navigationItems = [
                    ['route' => 'events', 'label' => 'Events', 'icon' => 'calendar-days'],
                    ['route' => 'profile', 'label' => 'Profile', 'icon' => 'user'],
                    ['route' => 'venues', 'label' => 'Venues', 'icon' => 'building-office'],
                    ['route' => 'speakers', 'label' => 'Speakers', 'icon' => 'users'],
                    ['route' => 'settings', 'label' => 'Settings', 'icon' => 'cog-6-tooth'],
                ];
            @endphp

            @foreach($navigationItems as $item)
                <a wire:navigate 
                   href="{{ route($item['route']) }}"
                   @class([
                       'flex items-center px-4 py-2 mt-5 transform rounded-md transition-colors duration-200',
                       'text-gray-200 bg-primary' => request()->routeIs($item['route']),
                       'text-primary hover:bg-primary hover:text-gray-200' => !request()->routeIs($item['route'])
                   ])>
                    <x-dynamic-component :component="'heroicon-s-'.$item['icon']" class="w-5 h-5" />
                    <span class="mx-4 font-medium text-base">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>
    <div class="text-center text-sm mx-auto flex items-center text-gray-500 mt-4">
        Made with <span class="text-red-500 mx-1">♥</span> by xhide3
    </div>
    <button @click="isToggled = !isToggled" 
            class="absolute -right-4 top-1/2 bg-primary text-white p-1 rounded-full transform -translate-y-1/2 xl:hidden">
        <x-heroicon-s-chevron-right class="w-4 h-4 transition-transform"
            :class="{ 'rotate-180': isToggled }" />
    </button>
</div>
