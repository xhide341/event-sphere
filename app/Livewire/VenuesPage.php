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
        $venues = Venue::select('name')
        ->groupBy('name')
        ->orderBy('name')
        ->paginate(10);

        return view('livewire.venues-page', [
            'venues' => $venues
        ]);
    }
}
