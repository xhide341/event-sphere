<x-app-layout>
    <x-slot name="header">
        <!--  -->
        <div class="flex flex-row flex-wrap items-center">
            <nav class="bg-transparent antialiased text-[#193441]">
                <ol class="flex flex-wrap pt-1 mr-8 bg-transparent">
                    <li class="text-sm breadcrumb-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0B2147"><path d="M149-100v-521l331-249 331 248.67V-100H564v-316H396v316H149Z"/></svg>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Pages
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Dashboard
                    </li>
                </ol>
                <h2 class="font-semibold text-xl capitalize">
                    {{ __('Dashboard') }}
                </h2>
            </nav>    
            <livewire:dashboard.toggle-sidebar/>
        </div>
    </x-slot>

    <div class="pt-4">
        <div class="max-w-screen mx-auto sm:pr-4 lg:pr-6 space-y-6">
            <div class="bg-milk-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col space-y-6 text-primary text-xl font-semibold p-6 text-gray-900">
                    <p class="mb-2">My Events</p>
                    <div>
                        @if($registeredEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                        <div class="flex flex-row space-x-6 justify-evenly">
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
            <div class="bg-milk-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col space-y-6 text-primary text-xl font-semibold p-6 text-gray-900">
                    <p class="mb-2">All Events</p>
                    <div>
                        @if($allEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                        <div class="flex flex-row space-x-6 justify-evenly">
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
