<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class VenuesPage extends Component
{
    use WithPagination;
    protected $layout = 'layouts.app';
    
    public function render()
    {
        $venues = Venue::with(['primaryImage', 'images'])  // Load relationships
            ->orderBy('name')
            ->paginate(8);

        return view('livewire.pages.venues-page', [
            'venues' => $venues
        ]);
    }
}
