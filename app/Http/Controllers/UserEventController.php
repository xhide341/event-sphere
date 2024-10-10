<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\Department;
use App\Models\Venue;
use App\Models\Speaker;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class UserEventController extends Controller
{
    /**
     * Show the events that the currently logged-in user has registered for.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showEvents(Request $request)
    {
        $user = Auth::user();
        $departmentId = $request->input('department');

        if ($user) {
            $registeredEvents = Event::select('events.*')
                ->join('registrations', 'events.id', '=', 'registrations.event_id')
                ->where('registrations.user_id', $user->id)
                ->when($departmentId, function ($query) use ($departmentId) {
                    return $query->where('events.department_id', $departmentId);
                })
                ->with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
                ->withCount('users')
                ->orderBy('events.start_date', 'asc')
                ->paginate(5, ['*'], 'registeredEventsPage');

            $allEvents = Event::with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name', 'users'])
                ->withCount('users')
                ->when($departmentId, function ($query) use ($departmentId) {
                    return $query->where('department_id', $departmentId);
                })
                ->orderBy('start_date', 'asc')
                ->paginate(5, ['*'], 'allEventsPage');

            $departments = Department::all();

            return view('events', [
                'registeredEvents' => $registeredEvents,
                'allEvents' => $allEvents,
                'departments' => $departments,
                'selectedDepartmentId' => $departmentId
            ]);
        }

        return redirect()->route('login')->with('error', 'Please log in to view your registered events.');
    }
}