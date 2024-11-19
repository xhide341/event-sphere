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
    public $screenWidth;
    public $perPage;
    
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
        
        $this->perPage = $this->calculatePerPage(1280); // Default to XL size
    }

    #[On('screenResize')]
    public function updatePerPage($width = null)
    {
        if ($width) {
            $this->screenWidth = $width;
            $this->perPage = $this->calculatePerPage($width);
            $this->resetPage('registeredEventsPage');
            $this->resetPage('allEventsPage');
        }
    }

    private function calculatePerPage($width)
    {
        // Calculate items per page based on screen width
        // Using 1 row as default layout
        if ($width >= 1280) {
            return 4;
        } elseif ($width >= 1024) {
            return 4;
        } elseif ($width >= 640) {
            return 2;
        } else {
            return 1; 
        }
    }

    public function render()
    {
        $user = Auth::user();
        
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
            ->paginate(4);
            // ->paginate($this->perPage, ['*'], 'registeredEventsPage');

        $allEvents = Event::with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
            ->withCount('users')
            ->when($this->allEventsDepartmentName, function ($query) {
                return $query->whereHas('department', function ($q) {
                    $q->where('name', $this->allEventsDepartmentName);
                });
            })
            ->orderBy('start_date', 'asc')
            ->paginate(4);
            // ->paginate($this->perPage, ['*'], 'allEventsPage');

        $departments = Department::all();
        
        return view('livewire.pages.events-page', [
            'registeredEvents' => $registeredEvents,
            'allEvents' => $allEvents,
            'departments' => $departments,
        ]);
    }
}