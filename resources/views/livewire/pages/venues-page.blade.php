<div>
    <x-slot name="header">
        <div class="rounded-lg flex flex-row flex-wrap items-center">
            <nav class="bg-transparent antialiased text-[#193441]">
                <ol class="flex flex-wrap pt-1 mr-8 bg-transparent">
                    <li class="text-sm breadcrumb-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0B2147"><path d="M149-100v-521l331-249 331 248.67V-100H564v-316H396v316H149Z"/></svg>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Pages
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Events
                    </li>
                </ol>
                <h2 class="font-semibold text-3xl capitalize">
                    {{ __('Venues') }}
                </h2>
            </nav>
        </div>
    </x-slot>
    <div class="mt-4">
        <div class="space-y-6 overflow-hidden">
            
            <div class="bg-white shadow-sm rounded-lg flex flex-col py-4 px-6 xl:py-6 xl:px-8 text-primary space-y-2 text-xl font-semibold">
                <div class="flex flex-row items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0B2147"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                    <h2 class="ml-2 text-2xl">Event Venues</h2>                    
                </div>
                <p class="text-sm text-gray-600 px-4 mb-2">Browse our list of venues for your next event.</p>
                @if($venues->isEmpty())
                    <p>No venues found.</p>
                @else
                    <div class="flex p-2 xl:p-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 w-full">
                            @foreach($venues as $venue)
                                <div wire:key="venue-{{ $venue->id }}">
                                    <livewire:components.venue-card
                                        :venue="$venue"
                                        :key="'venue-'.$venue->id"
                                    />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-4">
                        {{ $venues->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
