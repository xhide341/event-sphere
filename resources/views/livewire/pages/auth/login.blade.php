<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('events', absolute: false), navigate: true);
    }
}; ?>

<div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                wire:model="form.email" 
                id="email" 
                class="block mt-1 w-full text-custom-black text-base" 
                type="email" 
                name="email" 
                required 
                autofocus 
                autocomplete="username"
                placeholder="{{ __('email@example.com') }}"
            />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input 
                    wire:model="form.password" 
                    id="password" 
                    x-ref="passwordInput"
                    class="block mt-1 w-full pr-10 text-custom-black text-base" 
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                    placeholder="{{ __('********') }}"
                />
                <button 
                    type="button" 
                    x-data="{ show: false }"
                    @click="
                        show = !show;
                        $refs.passwordInput.type = show ? 'text' : 'password';
                    "
                    :class="show ? 'text-gray-600' : 'text-gray-400'"
                    class="absolute inset-y-0 right-0 pr-3 flex items-center"
                >
                    <svg class="h-5 w-5" fill="none" x-show="!show" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <svg class="h-5 w-5" fill="none" x-show="show" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between">
            <label for="remember" class="flex items-center">
                <input 
                    wire:model="form.remember" 
                    id="remember" 
                    type="checkbox" 
                    class="rounded border-gray-300 text-accent shadow-sm ring-0 focus:ring-0 focus:ring-offset-0"
                    name="remember"
                >
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
            @if (Route::has('password.request'))
                <a class="text-sm text-indigo-600 hover:text-indigo-500 hover:underline transition-colors duration-200" 
                   href="{{ route('password.request') }}" 
                   wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <div>
            <x-primary-button 
                class="w-full flex justify-center items-center px-4 py-3 relative"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>{{ __('Log in') }}</span>
                <span wire:loading class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('Logging in...') }}
                </span>
            </x-primary-button>
        </div>
    </form>
    <div class="mt-6 sm:mt-8 flex text-center justify-center">
        <p class="text-gray-600 text-sm">Don't have an account? <a href="{{ route('register') }}" class="text-accent hover:text-accent/80 hover:underline transition-colors duration-200">Sign up</a></p>
    </div>
</div>