<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyRelation;


class Venue extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'location',
        'capacity',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'capacity' => 'integer',
    ];

    public function events(): HasManyRelation
    {
        return $this->hasMany(Event::class);
    }

    /**
     * Check if venue is available (no ongoing events)
     */
    public function isAvailable(): bool
    {
        return !$this->events()
            ->where('status', 'ongoing')
            ->exists();
    }

    /**
     * Get current or upcoming event in this venue
     */
    public function getCurrentEvent()
    {
        return $this->events()
            ->where('status', 'ongoing')
            ->orWhere(function($query) {
                $query->where('status', 'upcoming')
                      ->where('start_date', '>', now());
            })
            ->orderBy('start_date')
            ->first();
    }
 
    /**
     * Get all venue images
     */
    public function images(): HasManyRelation
    {
        return $this->hasMany(VenueImage::class)->orderBy('sort_order');
    }

    /**
     * Get the primary venue image
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function primaryImage()
    {
        return $this->hasOne(VenueImage::class)->where('is_primary', true);
    }
    
    // task: add a scope to check if the venue has conflicting events
}
