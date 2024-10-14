<div>
    <aside x-data="{ isToggled: false }" 
        @toggle-sidebar.window="isToggled = !isToggled"
        :class="{ 'translate-x-0': isToggled, '-translate-x-full': !isToggled }"
        class="fixed flex flex-col bg-white z-50 w-64 px-8 py-10 h-full shadow-xl transform transition-transform ease-in-out duration-300 -translate-x-full xl:translate-x-0">
        <div class="mx-auto flex align-center justify-center space-x-2">
            <x-application-logo class="w-auto h-6 sm:h-7"/>
            <span class="text-primary text-base font-logo">{{ config('app.name') }}</span>
        </div>

        <div class="flex flex-col items-center mt-6 -mx-2">
            <img class="object-cover w-24 h-24 mx-2 rounded-full" src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80" alt="avatar">
            <h4 class="mx-2 mt-2 font-medium text-primary" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"></h4>
            <p class="mx-2 mt-1 text-sm font-medium text-gray-600">{{ auth()->user()->email }}</p>
        </div>

        <div class="flex flex-col justify-between flex-1 mt-6">
            <nav>
                <a wire:navigate href="/events" 
                    class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('events') ? 'text-gray-200 bg-gray-800 active:bg-gray-800 focus:bg-gray-800' : 'text-primary' }} transition-colors duration-300 transform rounded-lg hover:bg-gray-800 hover:text-gray-200 active:text-white">
                    <svg class="w-5 h-5 transition-colors duration-300 hover:stroke-gray-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 5V7M15 11V13M15 17V19M5 5C3.89543 5 3 5.89543 3 7V10C4.10457 10 5 10.8954 5 12C5 13.1046 4.10457 14 3 14V17C3 18.1046 3.89543 19 5 19H19C20.1046 19 21 18.1046 21 17V14C19.8954 14 19 13.1046 19 12C19 10.8954 19.8954 10 21 10V7C21 5.89543 20.1046 5 19 5H5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Events</span>
                </a>

                <a wire:navigate href="/profile" 
                    class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('profile') ? 'text-gray-200 bg-gray-800 active:bg-gray-800 focus:bg-gray-800' : 'text-primary' }} transition-colors duration-300 transform rounded-lg hover:bg-gray-800 hover:text-gray-200">
                    <svg class="w-5 h-5 transition-colors duration-300 hover:stroke-gray-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Profile</span>
                </a>

                <a wire:navigate href="/venues" 
                    class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('venues') ? 'text-gray-200 bg-gray-800 active:bg-gray-800 focus:bg-gray-800' : 'text-primary' }} transition-colors duration-300 transform rounded-lg hover:bg-gray-800 hover:text-gray-200 active:text-white">
                    <svg class="w-5 h-5 transition-colors duration-300 hover:stroke-gray-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 10H5C3.89543 10 3 10.8954 3 12V20C3 21.1046 3.89543 22 5 22H19C20.1046 22 21 21.1046 21 20V12C21 10.8954 20.1046 10 19 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 10V7C7 5.67392 7.52678 4.40215 8.46447 3.46447C9.40215 2.52678 10.6739 2 12 2C13.3261 2 14.5979 2.52678 15.5355 3.46447C16.4732 4.40215 17 5.67392 17 7V10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="mx-4 font-medium">Venues</span>
                </a>

                <a wire:navigate href="/speakers" 
                    class="flex items-center px-4 py-2 mt-5 {{ request()->routeIs('speakers') ? 'text-gray-200 bg-gray-800 active:bg-gray-800 focus:bg-gray-800' : 'text-primary' }} transition-colors duration-300 transform rounded-lg hover:bg-gray-800 hover:text-gray-200 active:text-white">
                    <svg class="w-5 h-5 transition-colors duration-300 hover:stroke-gray-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17 21V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H5C3.93913 15 2.92172 15.4214 2.17157 16.1716C1.42143 16.9217 1 17.9391 1 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 11C11.2091 11 13 9.20914 13 7C13 4.79086 11.2091 3 9 3C6.79086 3 5 4.79086 5 7C5 9.20914 6.79086 11 9 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M23 21V19C22.9993 18.1137 22.7044 17.2528 22.1614 16.5523C21.6184 15.8519 20.8581 15.3516 20 15.13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16 3.13C16.8604 3.35031 17.623 3.85071 18.1676 4.55232C18.7122 5.25392 19.0078 6.11683 19.0078 7.005C19.0078 7.89318 18.7122 8.75608 18.1676 9.45769C17.623 10.1593 16.8604 10.6597 16 10.88" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>

                    <span class="mx-4 font-medium">Speakers</span>
                </a>

                <a wire:navigate href="#" 
                    class="flex items-center px-4 py-2 mt-5 text-primary transition-colors duration-300 transform rounded-lg hover:bg-gray-800 hover:text-gray-200 active:text-white">
                    <svg class="w-5 h-5 transition-colors duration-300 hover:stroke-gray-200" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.3246 4.31731C10.751 2.5609 13.249 2.5609 13.6754 4.31731C13.9508 5.45193 15.2507 5.99038 16.2478 5.38285C17.7913 4.44239 19.5576 6.2087 18.6172 7.75218C18.0096 8.74925 18.5481 10.0492 19.6827 10.3246C21.4391 10.751 21.4391 13.249 19.6827 13.6754C18.5481 13.9508 18.0096 15.2507 18.6172 16.2478C19.5576 17.7913 17.7913 19.5576 16.2478 18.6172C15.2507 18.0096 13.9508 18.5481 13.6754 19.6827C13.249 21.4391 10.751 21.4391 10.3246 19.6827C10.0492 18.5481 8.74926 18.0096 7.75219 18.6172C6.2087 19.5576 4.44239 17.7913 5.38285 16.2478C5.99038 15.2507 5.45193 13.9508 4.31731 13.6754C2.5609 13.249 2.5609 10.751 4.31731 10.3246C5.45193 10.0492 5.99037 8.74926 5.38285 7.75218C4.44239 6.2087 6.2087 4.44239 7.75219 5.38285C8.74926 5.99037 10.0492 5.45193 10.3246 4.31731Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <span class="mx-4 font-medium">Settings</span>
                </a>
            </nav>
        </div>
    </aside>
</div>
