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
                    <div>
                        {{-- <livewire:dashboard.events /> --}}
                        @if($registeredEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                            <ul>
                                @foreach($registeredEvents as $event)
                                    <li>
                                        <strong>{{ $event->name }}</strong><br>
                                        {{ $event->description }}<br>
                                        <em>{{ $event->start_date->format('F j, Y') }} to {{ $event->end_date->format('F j, Y') }}</em>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
