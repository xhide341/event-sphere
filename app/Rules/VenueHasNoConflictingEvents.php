<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Event;
use App\Models\Venue;

class VenueHasNoConflictingEvents implements Rule
{
    private $startDate;
    private $endDate;
    private $startTime;
    private $endTime;

    public function __construct($startDate, $endDate, $startTime, $endTime)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function passes($attribute, $venueId)
    {
        $venue = Venue::find($venueId);
        if (!$venue) return false; // Optional, as exists should cover this

        $conflictingEvents = $venue->events()->conflictingWith(
            $this->startDate, $this->endDate, $this->startTime, $this->endTime
        )->count();

        return $conflictingEvents === 0;
    }

    public function message()
    {
        return 'The venue has conflicting events during the specified timeframe.';
    }
}