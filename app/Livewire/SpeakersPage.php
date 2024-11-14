<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Speaker;
use Livewire\WithPagination;
use Livewire\WithSorting;

class SpeakersPage extends Component
{    
    use WithPagination;
    protected $layout = 'layouts.app';

    public $speakers;

    public function mount()
    {
        $this->speakers = Speaker::all()            
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.pages.speakers-page', [
            'speakers' => $this->speakers
        ]);
    }
}
