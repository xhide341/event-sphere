<?php

namespace App\Livewire\EventPage;

use Livewire\Component;
use App\Models\Event;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

class EventCard extends Component
{
    public $showModal = false;
    public Event $event;
    public $type;
    public $modalContent;

    public function mount(Event $event, $type)
    {
        $this->event = $event;
        $this->type = $type;
        $this->modalContent = $this->getModalContent();
    }
    
    #[Computed]
    public function getModalContent()
    {
        return [
            'event_name' => $this->event->name,
            'description' => $this->event->description,
            'image' => $this->event->image,
            'department_name' => $this->event->department->name,
            'venue_name' => $this->event->venue->name,
            'capacity' => $this->event->venue->capacity,
            'status' => $this->event->status,
            'category' => $this->event->department->name,
        ];
    }
    
    public function getParticipantCount()
    {
        return $this->event->users()->count();
    }
    
    public function isUserRegistered()
    {
        return Auth::check() && $this->event->isUserRegistered(Auth::user()->id);
    }

    public function toggleRegistration()
    {
        if (!Auth::check()) {
            return;
        }

        if ($this->isUserRegistered()) {
            $this->event->users()->detach(Auth::user()->id);
        } else {
            $this->event->users()->attach(Auth::user()->id, ['registration_date' => now()]);
        }

        // Refresh the event model
        $this->event->refresh();

        // Dispatch event updated
        $this->dispatch('eventUpdated');
    }

    public function render()
    {
        return view('livewire.event-page.event-card');
    }
}
