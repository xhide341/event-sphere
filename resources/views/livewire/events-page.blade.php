<div x-data="screenWidth">
    <div x-show="isResizing" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col items-center">
            <svg class="animate-spin h-16 w-16 text-primary mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <p class="text-md font-base text-gray-700">Resizing screen...</p>
        </div>
    </div>
    
    <x-slot name="header">
        <div class="rounded-lg flex flex-row flex-wrap items-center">
            <nav class="bg-transparent antialiased text-[#193441]">
                <ol class="flex flex-wrap mr-8 bg-transparent">
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
                    {{ __('Events') }}
                </h2>
            </nav>
        </div>
    </x-slot>
    <div class="mt-4">
        <div class="space-y-6 overflow-hidden">
            <div class="bg-white shadow-sm rounded-lg flex flex-col p-4 xl:p-8 space-y-2 md:space-y-4 text-primary text-xl font-semibold">
                <div class="flex flex-row items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0B2147"><path d="M434.67-227.33 295.33-366l47.34-47.33 92 90.66 178.66-178.66 47.34 48-226 226ZM186.67-80q-27 0-46.84-19.83Q120-119.67 120-146.67v-600q0-27 19.83-46.83 19.84-19.83 46.84-19.83h56.66V-880h70v66.67h333.34V-880h70v66.67h56.66q27 0 46.84 19.83Q840-773.67 840-746.67v600q0 27-19.83 46.84Q800.33-80 773.33-80H186.67Zm0-66.67h586.66v-420H186.67v420Z"/></svg>
                    <p class="ml-2 text-2xl">My Events</p>
                </div>

                <!-- Department buttons for Registered Events -->
                <div class="flex flex-wrap gap-2">
                    <button wire:click="$set('registeredEventsDepartmentName', '')" 
                            class="px-4 py-2 text-sm font-medium {{ $registeredEventsDepartmentName === '' ? 'bg-indigo-100 text-indigo-800' : 'text-gray-700 bg-white' }} border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                        ALL
                    </button>
                    @foreach($uniqueDepartments as $departmentName)
                        <button wire:click="$set('registeredEventsDepartmentName', '{{ $departmentName }}')" 
                                class="px-4 py-2 text-sm font-medium {{ $registeredEventsDepartmentName === $departmentName ? 'bg-indigo-100 text-indigo-800' : 'text-gray-700 bg-white' }} border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none">
                            {{ $departmentName }}
                        </button>
                    @endforeach
                </div>

                @if($registeredEvents->isEmpty())
                    <p>No registered events found.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-2 xl:p-4" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                        @foreach($registeredEvents as $event)
                            <div wire:key="registered-event-wrapper-{{ $event->id }}">
                                <livewire:components.event-card 
                                    :event="$event"
                                    :type="'registered'"
                                    :key="'registered-'.$event->id"
                                />
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $registeredEvents->appends(['allEventsPage' => request('allEventsPage')])->links() }}
                    </div>
                @endif
            </div>

            <div class="bg-white shadow-sm rounded-lg flex flex-col p-4 xl:p-8 space-y-2 md:space-y-4 text-primary text-xl font-semibold">
                <div class="flex flex-row items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0B2147"><path d="M280-413.33V-480h400v66.67H280ZM280-240v-66.67h279.33V-240H280ZM186.67-80q-27 0-46.84-19.83Q120-119.67 120-146.67v-600q0-27 19.83-46.83 19.84-19.83 46.84-19.83h56.66V-880h70v66.67h333.34V-880h70v66.67h56.66q27 0 46.84 19.83Q840-773.67 840-746.67v600q0 27-19.83 46.84Q800.33-80 773.33-80H186.67Zm0-66.67h586.66v-420H186.67v420Z"/></svg>
                    <p class="ml-2 text-2xl">All Events</p>
                </div>
                
                <!-- Department buttons for All Events -->
                <div class="flex flex-wrap gap-2">
                    <button wire:click="$set('allEventsDepartmentName', '')" 
                            class="px-4 py-2 text-sm font-medium {{ $allEventsDepartmentName === '' ? 'bg-indigo-100 text-indigo-800' : 'text-gray-700 bg-white' }} border border-gray-300 rounded-md hover:bg-gray-50">
                        ALL
                    </button>
                    @foreach($uniqueDepartments as $departmentName)
                        <button wire:click="$set('allEventsDepartmentName', '{{ $departmentName }}')" 
                                class="px-4 py-2 text-sm font-medium {{ $allEventsDepartmentName === $departmentName ? 'bg-indigo-100 text-indigo-800' : 'text-gray-700 bg-white' }} border border-gray-300 rounded-md hover:bg-gray-50">
                            {{ $departmentName }}
                        </button>
                    @endforeach
                </div>

                @if($allEvents->isEmpty())
                    <p>No events found.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 p-2 xl:p-4" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));">
                        @foreach($allEvents as $event)
                            <div wire:key="all-event-wrapper-{{ $event->id }}">                                
                                <livewire:components.event-card 
                                    :event="$event"
                                    :type="'all'"
                                    :key="'all-'.$event->id"
                                />
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4">
                        {{ $allEvents->appends(['registeredEventsPage' => request('registeredEventsPage')])->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
