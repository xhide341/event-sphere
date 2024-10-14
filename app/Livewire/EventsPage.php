<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Department;
use Livewire\Attributes\On;

class EventsPage extends Component
{
    use WithPagination;

    public $selectedDepartmentId = '';
    
    protected $layout = 'layouts.app';

    #[On('eventUpdated')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }

    public function mount($selectedDepartmentId = null)
    {
        $this->selectedDepartmentId = $selectedDepartmentId;
    }

    public function render()
    {
        $user = Auth::user();
        
        if (!$user) {
            return $this->redirect(route('/'));
        }

        $registeredEvents = Event::select('events.*')
            ->join('registrations', 'events.id', '=', 'registrations.event_id')
            ->where('registrations.user_id', $user->id)
            ->when($this->selectedDepartmentId, function ($query) {
                return $query->where('events.department_id', $this->selectedDepartmentId);
            })
            ->with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
            ->withCount('users')
            ->orderBy('events.start_date', 'asc')
            ->paginate(5, ['*'], 'registeredEventsPage');

        $allEvents = Event::with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
            ->withCount('users')
            ->when($this->selectedDepartmentId, function ($query) {
                return $query->where('department_id', $this->selectedDepartmentId);
            })
            ->orderBy('start_date', 'asc')
            ->paginate(5, ['*'], 'allEventsPage');

        $departments = Department::all();

        return view('livewire.events-page', [
            'registeredEvents' => $registeredEvents,
            'allEvents' => $allEvents,
            'departments' => $departments,
        ]);
    }
}
