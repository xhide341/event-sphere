<div class="venue-card">
    <div class="image-container cursor-pointer" x-data="{ open: false }" @click="open = true">
        {{-- Primary Image --}}
        <img src="{{ $primaryImage }}" 
             alt="{{ $venue->name }}"
             class="h-48 w-full object-cover rounded-t-lg">
    </div>
    
    <div class="p-4 bg-white rounded-b-lg">
        <h3 class="text-lg font-semibold">{{ $venue->name }}</h3>
        <p class="text-sm text-gray-600">
            Status: <span class="font-medium {{ $isAvailable ? 'text-green-600' : 'text-red-600' }}">
                {{ $isAvailable ? 'Available' : 'Occupied' }}
            </span>
        </p>
    </div>

    <!-- Modal -->
    <div x-data="{ open: false }">
        <div x-show="open" 
             @click.away="open = false" 
             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
             x-cloak>
            <div class="bg-white p-6 rounded-lg max-w-3xl w-full">
                {{-- Primary Image in Modal --}}
                <img src="{{ $primaryImage }}" 
                     alt="{{ $venue->name }}"
                     class="h-96 w-full object-cover rounded-lg mb-4">

                {{-- Gallery Images --}}
                <div class="grid grid-cols-3 gap-4 mb-4">
                    @foreach($galleryImages as $image)
                        <img src="{{ $image['url'] }}" 
                             alt="{{ $image['alt'] }}"
                             class="h-32 w-full object-cover rounded-lg">
                    @endforeach
                </div>

                <h2 class="text-2xl font-bold mb-2">{{ $venue->name }}</h2>
                <p class="text-gray-600 mb-4">
                    Status: <span class="font-medium {{ $isAvailable ? 'text-green-600' : 'text-red-600' }}">
                        {{ $isAvailable ? 'Available' : 'Occupied' }}
                    </span>
                </p>
                
                @if($currentEvent)
                    <div class="mb-4">
                        <h3 class="font-semibold">Current/Upcoming Event:</h3>
                        <p>{{ $currentEvent->name }}</p>
                    </div>
                @endif

                <button @click="open = false" 
                        class="bg-primary-500 text-white px-4 py-2 rounded hover:bg-primary-600">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
