<x-app-layout>
    <x-slot name="header">
        <!--  -->
        <div class="rounded-lg flex flex-row flex-wrap items-center">
            <nav class="bg-transparent antialiased text-[#193441]">
                <ol class="flex flex-wrap pt-1 mr-8 bg-transparent">
                    <li class="text-sm breadcrumb-item">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#0B2147"><path d="M149-100v-521l331-249 331 248.67V-100H564v-316H396v316H149Z"/></svg>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Pages
                    </li>
                    <li class="text-sm pl-2 capitalize leading-normal before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">
                        Events
                    </li>
                </ol>
                <h2 class="font-semibold text-3xl capitalize">
                    {{ __('Events') }}
                </h2>
            </nav>
            <div class="block xl:hidden">
                <livewire:layout.toggle-sidebar/>
            </div>
        </div>
    </x-slot>

    <div class="mt-4">
        <div class="space-y-6 overflow-hidden">
            <div class="bg-white shadow-sm rounded-lg flex flex-col py-4 px-6 xl:py-6 xl:px-8 space-y-2 md:space-y-6 text-primary text-xl font-semibold">
                <div class="flex flex-row items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0B2147"><path d="M434.67-227.33 295.33-366l47.34-47.33 92 90.66 178.66-178.66 47.34 48-226 226ZM186.67-80q-27 0-46.84-19.83Q120-119.67 120-146.67v-600q0-27 19.83-46.83 19.84-19.83 46.84-19.83h56.66V-880h70v66.67h333.34V-880h70v66.67h56.66q27 0 46.84 19.83Q840-773.67 840-746.67v600q0 27-19.83 46.84Q800.33-80 773.33-80H186.67Zm0-66.67h586.66v-420H186.67v420Z"/></svg>
                    <p class="ml-2 text-2xl">My Events</p>
                </div>
                <div>
                    @if($registeredEvents->isEmpty())
                        <p>No events registered.</p>
                    @else
                    <div class="flex pb-2 xl:pb-4 flex-row space-x-4 overflow-x-auto">
                        @foreach($registeredEvents as $event)
                            <div class="flex-shrink-0">
                                <livewire:event_page.event-card :event="$event" :wire:key="'registered_'.$event->id" />
                            </div>
                        @endforeach
                    </div>
                    @endif
                    <div class="mt-4">
                        {{ $registeredEvents->links() }}
                    </div>
                </div>
            </div>
            <div class="space-y-6 overflow-hidden">
                <div class="bg-white shadow-sm rounded-lg flex flex-col p-4 xl:p-8 space-y-2 md:space-y-4 text-primary text-xl font-semibold">
                    <div class="flex flex-row items-center space-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0B2147"><path d="M280-413.33V-480h400v66.67H280ZM280-240v-66.67h279.33V-240H280ZM186.67-80q-27 0-46.84-19.83Q120-119.67 120-146.67v-600q0-27 19.83-46.83 19.84-19.83 46.84-19.83h56.66V-880h70v66.67h333.34V-880h70v66.67h56.66q27 0 46.84 19.83Q840-773.67 840-746.67v600q0 27-19.83 46.84Q800.33-80 773.33-80H186.67Zm0-66.67h586.66v-420H186.67v420Z"/></svg>
                        <p class="ml-2 text-2xl">All Events</p>
                    </div>
                    <div>
                        @if($allEvents->isEmpty())
                            <p>No events registered.</p>
                        @else
                        <div class="flex pb-2 xl:pb-4 flex-row space-x-4 overflow-x-auto">
                            @foreach($allEvents as $event)
                            <div class="flex-shrink-0">
                                <livewire:event_page.event-card :event="$event" :wire:key="'all_'.$event->id"/>
                            </div>
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
