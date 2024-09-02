<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Registration; // Make sure to include the Registration model
use App\Models\Event; // Assuming Event model is defined

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
            $registeredEvents = Event::whereIn('id', function ($query) use ($user) {
                $query->select('event_id')
                      ->from('registrations')
                      ->where('user_id', $user->id);
            })->paginate(4, ['*'], 'registeredEventsPage');

            $allEvents = Event::paginate(4, ['*'], 'allEventsPage');

            return view('dashboard', compact('registeredEvents', 'allEvents'));
        }

        return redirect()->route('login')->with('error', 'Please log in to view your registered events.');
    }
}

