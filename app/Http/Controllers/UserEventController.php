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
    public function showRegisteredEvents()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Check if the user exists
        if ($user) {
            // Retrieve the events that the user has registered for
            $registeredEvents = Event::whereIn('id', function ($query) use ($user) {
                $query->select('event_id')
                      ->from('registrations')
                      ->where('user_id', $user->id);
            })->simplePaginate(3);

            // Pass the registered events to the dashboard view
            return view('dashboard', compact('registeredEvents'));
        }

        // Handle case where user is not authenticated
        return redirect()->route('login')->with('error', 'Please log in to view your registered events.');
    }
}

