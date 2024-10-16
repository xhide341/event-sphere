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

    public $registeredEventsDepartmentName = '';
    public $allEventsDepartmentName = '';
    public $uniqueDepartments;
    
    protected $layout = 'layouts.app';

    #[On('eventUpdated')]
    public function refresh()
    {
        $this->dispatch('$refresh');
    }

    public function mount()
    {
        $this->uniqueDepartments = Department::select('name')
            ->distinct()
            ->orderBy('name')
            ->pluck('name');
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
            ->when($this->registeredEventsDepartmentName, function ($query) {
                return $query->whereHas('department', function ($q) {
                    $q->where('name', $this->registeredEventsDepartmentName);
                });
            })
            ->with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
            ->withCount('users')
            ->orderBy('events.start_date', 'asc')
            ->paginate(5, ['*'], 'registeredEventsPage');

        $allEvents = Event::with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
            ->withCount('users')
            ->when($this->allEventsDepartmentName, function ($query) {
                return $query->whereHas('department', function ($q) {
                    $q->where('name', $this->allEventsDepartmentName);
                });
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
