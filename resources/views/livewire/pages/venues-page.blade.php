<div>
    <x-slot name="header">
        <div class="ml-1 rounded-lg flex flex-row flex-wrap items-center w-full">
            <nav class="bg-transparent antialiased text-primary-dark">
                <ol class="flex flex-wrap mr-8 bg-transparent items-center">
                    <li class="text-sm breadcrumb-item align-middle">
                        <x-heroicon-s-home class="w-5 h-5 text-primary-dark" />
                    </li>
                    <li class="text-sm capitalize leading-normal flex items-center">
                        <x-heroicon-s-chevron-right class="w-4 h-4 text-gray-600 mx-2" />
                        Pages
                    </li>
                    <li class="text-sm capitalize leading-normal flex items-center">
                        <x-heroicon-s-chevron-right class="w-4 h-4 text-gray-600 mx-2" />
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
                        <h2 class="text-xl font-medium text-primary-dark align-middle">
                            {{ __('Venues') }}
                        </h2>
                    </div>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __("Browse a list of venues here.") }}
                    </p>
                </header>
                @if($venues->isEmpty())
                    <p>No venues found.</p>
                @else
                    <div class="flex p-2 xl:p-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 w-full">
                            @foreach($venues as $venue)
                                <div wire:key="venue-{{ $venue->id }}">
                                    <livewire:components.venue-card :venue="$venue" :key="'venue-' . $venue->id" />
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