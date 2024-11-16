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

    public function mount()
    {
        // Remove this line - we'll handle speakers in render()
    }

    public function render()
    {
        return view('livewire.pages.speakers-page', [
            'speakers' => Speaker::query()
                ->paginate(10)
        ]);
    }
}
