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
                        Dashboard
                    </li>
                </ol>
                <h2 class="font-semibold text-3xl capitalize">
                    {{ __('Dashboard') }}
                </h2>
            </nav>
            <div class="block xl:hidden">
                <livewire:layout.toggle-sidebar/>
            </div>
        </div>
    </x-slot>


    <div class="mt-4">
        <div class="max-w-dvw mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow-sm rounded-lg">
                <div class="max-w-[200px] text-xl text-primary flex flex-col">
                    <h1 class="font-semibold">Upcoming Events</h1>
                    <span class="text-2xl">0</span>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
