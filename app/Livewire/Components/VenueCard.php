<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Venue;

class VenueCard extends Component
{
    protected $layout = 'layouts.app';
    public Venue $venue;
    
    public function mount(Venue $venue)
    {
        $this->venue = $venue;
    }

    public function render()
    {
        return view('livewire.components.venue-card');
    }
}
