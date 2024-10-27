<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Venue;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class VenuesPage extends Component
{
    use WithPagination;
    protected $layout = 'layouts.app';
    
    public function render()
    {
        $venues = Venue::with(['primaryImage', 'images'])  // Load relationships
            ->orderBy('name')
            ->paginate(8);

        Log::info('Venues Query:', [
            'count' => $venues->count(),
            'first_venue' => $venues->first()?->toArray()
        ]);

        return view('livewire.venues-page', [
            'venues' => $venues
        ]);
    }
}
