<?php

use Livewire\Volt\Component;
use Illuminate\Support\Facades\Mail;

new class extends Component {
    public $name;
    public $email;
    public $message;

    public function submit()
    {
        // Use unguarded to fill the properties
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|max:500',
        ]);

        $recipientEmail = "shawnehgn10@gmail.com";
        try {
            // Send the email
            $fromEmail = $this->email; // Capture the email in a variable
            Mail::raw("From {$fromEmail}\n\n{$this->message}", function ($message) use ($recipientEmail, $fromEmail) {
                $message->to($recipientEmail)
                    ->from(env("MAIL_FROM_ADDRESS"))
                    ->subject('New Contact Form Submission');
            });

            session()->flash('message', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            session()->flash('error', 'There was an error sending your message. Please try again later.');
        }

        $this->reset();
    }
} ?>

<form wire:submit="submit" class="space-y-6 w-full max-w-md">
    @csrf

    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input wire:model="name" id="name" class="block mt-1 w-full text-custom-black md:text-base text-sm"
            type="text" name="name" required />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input wire:model="email" id="email" class="block mt-1 w-full text-custom-black md:text-base text-sm"
            type="email" name="email" required />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label for="message" :value="__('Message')" />
        <textarea wire:model="message" id="message" name="message"
            class="border-gray-400 focus:border-primary focus:ring-primary rounded-md shadow-sm block mt-1 w-full text-custom-black md:text-base text-sm h-32"
            required></textarea>
        <x-input-error :messages="$errors->get('message')" class="mt-2" />
    </div>

    <div>
        <x-primary-button class="w-full flex justify-center items-center relative" wire:loading.attr="disabled">
            <span wire:loading.remove>{{ __('Submit') }}</span>
            <span wire:loading class="flex items-center">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </span>
        </x-primary-button>

        @if (session()->has('message'))
            <div class="mt-4 text-success text-sm text-center">
                {{ session('message') }}
            </div>
        @elseif (session()->has('error'))
            <div class="mt-4 text-error text-sm text-center">
                {{ session('error') }}
            </div>
        @endif
    </div>
</form>