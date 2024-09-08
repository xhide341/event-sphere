<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration;
use App\Models\Event;
use App\Models\Department;


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
            $registeredEvents = Event::with('department')
                ->whereIn('id', function ($query) use ($user) {
                    $query->select('event_id')
                          ->from('registrations')
                          ->where('user_id', $user->id);
                })->paginate(5, ['*'], 'registeredEventsPage');

            $allEvents = Event::with('department')->paginate(5, ['*'], 'allEventsPage');

            $departments = Department::all();

            return view('dashboard', compact('registeredEvents', 'allEvents', 'departments'));
        }

        return redirect()->route('login')->with('error', 'Please log in to view your registered events.');
    }
}

