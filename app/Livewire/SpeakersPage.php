<?php

namespace App\Livewire;

use Livewire\Component;

class SpeakersPage extends Component
{

    
    protected $layout = 'layouts.app';

    public function render()
    {
        return view('livewire.pages.speakers-page');
    }
}
