<?php

namespace App\Http\Livewire\Layout;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Sidebar extends Component
{
    public function render()
    {
        return view('livewire.layout.sidebar');
    }
}