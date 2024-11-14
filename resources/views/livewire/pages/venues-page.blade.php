<div>
    <x-slot name="header">
        <div class="ml-1 rounded-lg flex flex-row flex-wrap items-center w-full">
            <nav class="bg-transparent antialiased text-primary">
                <ol class="flex flex-wrap mr-8 bg-transparent">
                    <li class="text-sm breadcrumb-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0B2147""><path d="M149-100v-521l331-249 331 248.67V-100H564v-316H396v316H149Z"/></svg>
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Pages
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Venues
                    </li>
                </ol>
                <h2 class="font-semibold text-3xl capitalize mt-2">
                    {{ __('Venues') }}
                </h2>
            </nav>
        </div>
    </x-slot>
    <div class="mt-4 font-poppins">
        <div class="space-y-6 overflow-hidden">     
            <div class="bg-white shadow-sm rounded-lg flex flex-col p-4 sm:p-8">
                <header>
                    <div class="flex flex-row items-center space-x-2">
                        <x-heroicon-s-building-office class="w-6 h-6 flex-shrink-0" />
                        <h2 class="text-lg font-medium text-gray-900 align-middle">
                            {{ __('Event Venues') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Browse our list of venues for your next event.") }}
                    </p>
                </header>
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
