<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Event;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EventCard extends Component
{
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
            'schedule' => Carbon::parse($this->event->start_date)->format('M j, Y g:i A'),
            'speaker' => $this->event->speaker ? $this->event->speaker->name : 'No speaker assigned'
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

    public function getCountdown()
    {
        $eventDate = Carbon::parse($this->modalContent['schedule']);
        $now = Carbon::now();
        $eventEndDate = $eventDate->copy()->addHours(2); // Assuming events last 2 hours, adjust as needed

        if ($now->gt($eventEndDate)) {
            return 'Event has ended';
        }

        if ($now->gt($eventDate)) {
            return 'Event in progress';
        }

        $diff = $now->diff($eventDate);

        if ($diff->days > 0) {
            return 'Starts in: ' . $diff->format('%d days, %h hrs');
        } elseif ($diff->h > 0) {
            return 'Starts in: ' . $diff->format('%h hrs, %i mins');
        } else {
            return 'Starts in: ' . $diff->format('%i mins');
        }
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

        $this->event->refresh();
        $this->dispatch('eventUpdated');
    }

    public function render()
    {
        return view('livewire.components.event-card');
    }
}
