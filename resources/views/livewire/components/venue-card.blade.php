<div class="venue-card group hover:shadow-lg transition-shadow duration-300 rounded-lg overflow-hidden"
     x-data="{ 
        open: false,
        activeIndex: 0,
        totalSlides: {{ count($galleryImages) + 1 }},
        next() {
            this.activeIndex = (this.activeIndex + 1) % this.totalSlides;
        },
        prev() {
            this.activeIndex = (this.activeIndex - 1 + this.totalSlides) % this.totalSlides;
        }
     }">
    <!-- Card Content -->
    <div class="relative overflow-hidden">
        <div class="image-container cursor-pointer" @click="open = true">
            <img src="{{ $primaryImage }}" 
                 alt="{{ $venue->name }}"
                 class="h-48 w-full object-cover transform hover:scale-105 transition-transform duration-300">
            
            <!-- Availability Badge -->
            <div class="absolute top-4 right-4">
                <span class="px-3 py-1 text-sm font-medium rounded-full {{ $isAvailable ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $isAvailable ? 'Available' : 'Occupied' }}
                </span>
            </div>
        </div>
        
        <div class="p-4 bg-white">
            <h3 class="text-lg font-semibold text-gray-900">{{ $venue->name }}</h3>
            @if($currentEvent)
                <p class="text-sm text-gray-600 mt-1">
                    Current Event: {{ $currentEvent->name }}
                </p>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div x-show="open" 
         x-cloak
         @click.outside="open = false"
         class="fixed inset-0 z-50 overflow-y-auto"
         aria-labelledby="modal-title"
         role="dialog"
         aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Backdrop -->
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" 
                 aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal Content -->
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="inline-block align-bottom bg-white rounded-lg border-2 border-primary text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                
                <!-- Close Button -->
                <button @click="open = false" 
                        class="absolute top-4 right-4 z-50 text-gray-400 transition-colors duration-200 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Carousel Section -->
                <div class="relative h-[32rem]">
                    <!-- Primary Image -->
                    <div x-show="activeIndex === 0"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-x-full"
                         x-transition:enter-end="opacity-100 transform translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform translate-x-0"
                         x-transition:leave-end="opacity-0 transform -translate-x-full"
                         class="absolute inset-0">
                        <img src="{{ $primaryImage }}" 
                             alt="{{ $venue->name }}"
                             class="w-full h-full object-cover">
                    </div>

                    <!-- Gallery Images -->
                    @if(count($galleryImages) > 0)
                        @foreach($galleryImages as $image)
                            <div x-show="activeIndex === {{ $loop->index + 1 }}"
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform translate-x-full"
                                    x-transition:enter-end="opacity-100 transform translate-x-0"
                                    x-transition:leave="transition ease-in duration-300"
                                    x-transition:leave-start="opacity-100 transform translate-x-0"
                                    x-transition:leave-end="opacity-0 transform -translate-x-full"
                                    class="absolute inset-0">
                                <img src="{{ $image['url'] }}" 
                                     alt="{{ $image['alt'] }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    @endif

                    <!-- Navigation Arrows -->
                    <button @click="prev()" 
                            class="absolute left-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/10 backdrop-blur-sm text-white hover:bg-white/20 transition-colors duration-200 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    <button @click="next()" 
                            class="absolute right-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/10 backdrop-blur-sm text-white hover:bg-white/20 transition-colors duration-200 z-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    <!-- Dots Navigation -->
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
                        <button @click="activeIndex = 0"
                                class="w-2 h-2 rounded-full transition-colors duration-200"
                                :class="{ 'bg-white': activeIndex === 0, 'bg-white/50': activeIndex !== 0 }"></button>
                        @foreach($galleryImages as $index => $image)
                            <button @click="activeIndex = {{ $index + 1 }}"
                                    class="w-2 h-2 rounded-full transition-colors duration-200"
                                    :class="{ 'bg-white': activeIndex === {{ $index + 1 }}, 'bg-white/50': activeIndex !== {{ $index + 1 }} }"></button>
                        @endforeach
                    </div>
                </div>

                <!-- Venue Details Section - Outside the carousel container -->
                <div class="p-6 bg-white">
                    <h2 class="text-2xl font-bold text-gray-900">{{ $venue->name }}</h2>
                    
                    <div class="mt-4">
                        <div class="bg-gray-100 rounded-lg p-4 shadow-sm">
                            <div class="grid grid-cols-1 gap-x-5 gap-y-4 sm:grid-cols-2">
                                <!-- Availability Status -->
                                <div class="flex items-center space-x-3">
                                    <div class="bg-primary bg-opacity-10 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 {{ $isAvailable ? 'text-green-600' : 'text-red-600' }}" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Status</p>
                                        <p class="text-sm font-semibold {{ $isAvailable ? 'text-green-600' : 'text-red-600' }}">
                                            {{ $isAvailable ? 'Available' : 'Occupied' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Capacity -->
                                <div class="flex items-center space-x-3">
                                    <div class="bg-primary bg-opacity-10 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Capacity</p>
                                        <p class="text-sm font-semibold text-primary">{{ $venue->capacity ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Location -->
                                <div class="flex items-center space-x-3">
                                    <div class="bg-primary bg-opacity-10 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Location</p>
                                        <p class="text-sm font-semibold text-primary">{{ $venue->location ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Current/Upcoming Event -->
                                @if($currentEvent)
                                <div class="flex items-center space-x-3">
                                    <div class="bg-primary bg-opacity-10 rounded-full p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-xs text-gray-500 font-medium">Current Event</p>
                                        <p class="text-sm font-semibold text-primary">{{ $currentEvent->name }}</p>
                                    </div>
                                </div>
                                @endif
                            </div>

                            @if($venue->description)
                            <div class="mt-4">
                                <p class="text-sm text-gray-700">{{ $venue->description }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
