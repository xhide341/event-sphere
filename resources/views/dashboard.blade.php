<x-app-layout>
    <x-slot name="header">
        <!-- <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> -->
        <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
                <li class="leading-normal text-sm breadcrumb-item">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0B2147"><path d="M192-228v-336q0-16.85 7.5-31.92Q207-611 221-622l216-162q20-14 43-14t43 14l216 162q14 11 21.5 26.08Q768-580.85 768-564v336q0 34.65-24.67 59.32Q718.65-144 684-144h-96q-15.3 0-25.65-10.35Q552-164.7 552-180v-192q0-15.3-10.32-25.65Q531.35-408 516.09-408h-71.83q-15.26 0-25.76 10.35Q408-387.3 408-372v192q0 15.3-10.35 25.65Q387.3-144 372-144h-96q-34.65 0-59.32-24.68Q192-193.35 192-228Z"/></svg>
                </li>
                <li class="text-md pl-2 capitalize leading-normal text-primary before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                    Dashboard
                </li>
            </ol>
        </nav>
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
