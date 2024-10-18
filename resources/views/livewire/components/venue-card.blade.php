<div>
    <div class="venue-card">
        <div class="image-container cursor-pointer" x-data="{ open: false }" @click="open = true">
            <div class="placeholder bg-primary-100 text-primary-500 flex items-center justify-center h-48 w-full rounded-t-lg">
                <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        
        <div class="p-4 bg-white rounded-b-lg">
            <h3 class="text-lg font-semibold">{{ $venue->name }}</h3>
            <p class="text-sm text-gray-600">
                Status: <span class="font-medium text-green-600">Available</span>
            </p>
        </div>

        <!-- Modal -->
        <div x-data="{ open: false }">
            <div x-show="open" @click.away="open = false" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                <div class="bg-white p-6 rounded-lg max-w-3xl w-full">
                    <div class="placeholder bg-primary-100 text-primary-500 flex items-center justify-center h-96 w-full rounded-lg mb-4">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold mb-2">{{ $venue->name }}</h2>
                    <p class="text-gray-600 mb-4">
                        Status: <span class="font-medium text-green-600">Available</span>
                    </p>
                    <button @click="open = false" class="bg-primary-500 text-white px-4 py-2 rounded hover:bg-primary-600">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>