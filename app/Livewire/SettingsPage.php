<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class SettingsPage extends Component
{
    public function logout()
    {
        Auth::logout();
        
        session()->invalidate();
        session()->regenerateToken();
        
        return $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.settings');
    }
}
