<?php

use App\Models\User;
use App\Models\Student;
use App\Models\Organizer;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $role = 'student'; // Default role

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:student,organizer'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('events', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register" class="space-y-6">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input 
                wire:model="name" 
                id="name" 
                class="block mt-1 w-full text-custom-black text-base" 
                type="text" 
                name="name" 
                required 
                autofocus 
                autocomplete="name"
            />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input 
                wire:model="email" 
                id="email" 
                class="block mt-1 w-full text-custom-black text-base" 
                type="email" 
                name="email" 
                required 
                autocomplete="username"                
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input 
                wire:model="password" 
                id="password" 
                class="block mt-1 w-full text-custom-black text-base"
                type="password"
                name="password"
                required 
                autocomplete="new-password" 
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input 
                wire:model="password_confirmation" 
                id="password_confirmation" 
                class="block mt-1 w-full text-custom-black text-base"
                type="password"
                name="password_confirmation" 
                required 
                autocomplete="new-password" 
            />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div>
            <x-primary-button 
                class="w-full flex justify-center items-center px-4 py-3 relative mt-4"
                wire:loading.attr="disabled"
            >
                <span wire:loading.remove>{{ __('Register') }}</span>
                <span wire:loading class="flex items-center">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('Registering...') }}
                </span>
            </x-primary-button>
        </div>
    </form>
    <div class="mt-6 sm:mt-8 flex text-center justify-center">
        <p class="text-gray-600 text-sm">Already have an account? <a href="{{ route('login') }}" class="text-accent hover:text-accent/80 hover:underline transition-colors duration-200">Log in</a></p>
    </div>
</div>