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
    public function showEvents() {
        $user = Auth::user();

        if ($user) {
            $registeredEvents = Event::select('events.*', 'registrations.registration_date')
                ->join('registrations', 'events.id', '=', 'registrations.event_id')
                ->where('registrations.user_id', $user->id)
                ->with(['department:id,name', 'venue:id,name,capacity', 'speaker:id,name'])
                ->withCount('users')
                ->orderBy('events.start_date', 'asc')
                ->paginate(5, ['*'], 'registeredEventsPage');

            $allEvents = Event::with('department', 'venue', 'speaker')
                ->withCount('users')
                ->paginate(5, ['*'], 'allEventsPage');
            $departments = Department::all();
            $venues = Venue::all();

            return view('events', [
                'registeredEvents' => $registeredEvents,
                'allEvents' => $allEvents,
                'departments' => $departments,
                'venues' => $venues
            ]);
        }

        return redirect()->route('login')->with('error', 'Please log in to view your registered events.');
    }
}

