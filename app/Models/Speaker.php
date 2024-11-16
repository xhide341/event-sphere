<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'bio', 'phone_number', 'avatar'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function isAvailable($startDate, $endDate, $startTime, $endTime, $excludeEventId = null)
    {
        $query = $this->events()
            ->conflictingWith($startDate, $endDate, $startTime, $endTime);

        if ($excludeEventId) {
            $query->where('id', '!=', $excludeEventId);
        }

        return $query->count() === 0;
    }
}
