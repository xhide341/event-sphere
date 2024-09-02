<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-screen mx-auto sm:pr-4 lg:pr-6 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col space-y-6 text-primary text-xl font-semibold p-6 text-gray-900">
                    <p class="mb-2">My Events</p>
                    <div>
                        @if($registeredEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                        <div class="flex flex-row space-x-6">
                            @foreach($registeredEvents as $event)
                                <livewire:dashboard.events :event="$event" />
                            @endforeach
                        </div>
                        @endif
                        <div class="mt-4">
                            {{ $registeredEvents->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col space-y-6 text-primary text-xl font-semibold p-6 text-gray-900">
                    <p class="mb-2">All Events</p>
                    <div>
                        @if($allEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                        <div class="flex flex-row space-x-6">
                            @foreach($allEvents as $event)
                                <livewire:dashboard.events :event="$event" />
                            @endforeach
                        </div>
                        @endif
                        <div class="mt-4">
                            {{ $allEvents->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
