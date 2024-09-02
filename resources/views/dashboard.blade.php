<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-screen mx-auto sm:px-4 lg:px-6 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col space-y-4 text-primary text-xl font-semibold p-6 text-gray-900">
                    <p class="mb-6">My Events</p>
                    <div class="flex flex-row justify-center">
                        @if($registeredEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                        <div class="flex flex-row space-x-4">
                            @foreach($registeredEvents as $event)
                            <livewire:dashboard.events :event="$event" />
                            @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="mt-4">
                        {{ $registeredEvents->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
