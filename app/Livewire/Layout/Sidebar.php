<?php

namespace App\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]
class Sidebar extends Component
{
    public $avatarUrl;
    
    public function mount()
    {
        $this->generateAvatarUrl();
    }

    public function generateAvatarUrl()
    {
        $user = auth()->user();

        if ($user->avatar) {
            try {            
                $this->avatarUrl = Storage::disk('s3')->temporaryUrl('avatars/minion.jpg', now()->addMinutes(120));
            } catch (\Exception $e) {
                $this->avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($user->name);
            }
        } else {
            $this->avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($user->name);
        }
    }

    public function render()
    {
        return view('livewire.layout.sidebar');
    }

    #[On('profile-updated')]
    public function handleProfileUpdate()
    {
        $this->generateAvatarUrl();
    }
}
