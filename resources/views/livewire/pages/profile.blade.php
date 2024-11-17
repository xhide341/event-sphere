<x-app-layout>
    <x-slot name="header">
        <div class="ml-1 rounded-lg flex flex-row flex-wrap items-center w-full">
            <nav class="bg-transparent antialiased text-primary">
                <ol class="flex flex-wrap mr-8 bg-transparent items-center">
                    <li class="text-sm breadcrumb-item align-middle">
                        <x-heroicon-s-home class="w-5 h-5 text-primary" />
                    </li>
                    <li class="text-sm capitalize leading-normal flex items-center">
                        <x-heroicon-s-chevron-right class="w-4 h-4 text-gray-600 mx-2" />
                        Pages
                    </li>
                    <li class="text-sm capitalize leading-normal flex items-center">
                        <x-heroicon-s-chevron-right class="w-4 h-4 text-gray-600 mx-2" />
                        Profile
                    </li>
                </ol>
                <h2 class="font-semibold text-3xl capitalize mt-2">
                    {{ __('Profile') }}
                </h2>
            </nav>
        </div>
    </x-slot>

    <div class="mt-4">
        <div class="max-w-dvw mx-auto space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow-sm rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
