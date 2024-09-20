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

<form wire:submit="submit" class="w-full max-w-md px-4">
    @csrf
    
    <div class="mb-4">
        <label for="name" class="block text-sm mb-2">Name</label>
        <input wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" placeholder="Enter your name" required>
    </div>
    <div class="mb-4">
        <label for="email" class="block text-sm mb-2">Email</label>
        <input wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email" required>
    </div>
    <div class="mb-4">
        <label for="message" class="block text-sm mb-2">Message</label>
        <textarea wire:model="message" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32" id="message" placeholder="Enter your message" required></textarea>
    </div>
    <div class="flex flex-col items-center justify-center mt-4 space-y-2 sm:mt-6 sm:space-y-4">
        <button class="min-w-fit w-32 bg-accent hover:bg-primary text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Submit
        </button>
        @if (session()->has('message'))
        <div class="mt-4 text-success text-sm">
            {{ session('message') }}
        </div>
        @elseif (session()->has('error'))
        <div class="mt-4 text-error text-sm">
            {{ session('error') }}
        </div>
        @endif
    </div>

</form>