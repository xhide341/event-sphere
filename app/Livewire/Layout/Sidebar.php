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

        // If user has an avatar (from Google or uploaded), use it directly
        // Otherwise, fallback to UI Avatars
        if ($user->avatar_type === 'google') {
            $this->avatarUrl = $user->avatar;
        } elseif ($user->avatar_type === 's3') {
            $this->avatarUrl = Storage::disk('s3')->temporaryUrl($user->avatar, now()->addMinutes(120));
        } else {
            $this->avatarUrl = "https://api.dicebear.com/9.x/initials/svg?seed=" . urlencode($user->name);
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
