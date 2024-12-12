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
                        Settings
                    </li>
                </ol>
                <h2 class="font-semibold text-3xl capitalize mt-2">
                    {{ __('Settings') }}
                </h2>
            </nav>
        </div>
    </x-slot>
    <div class="mt-4 font-poppins">
        <div class="space-y-6 overflow-hidden">
            <div class="bg-white shadow-sm rounded-lg flex flex-col p-4 sm:p-8">
                <h2 class="text-lg font-medium text-gray-900 align-middle">
                    {{ __('Settings') }}
                </h2>

                <div class="mt-6">
                    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-logout')">
                        {{ __('Logout') }}
                    </x-danger-button>
                </div>
            </div>

        </div>
    </div>

    <x-modal name="confirm-logout" :show="false" focusable>
        <form wire:submit="logout" class="p-6">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to logout?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('You will be redirected to the login page.') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Logout') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>