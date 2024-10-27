<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VenueImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_id',
        'path',
        'is_primary',
        'sort_order'
    ];

    protected $casts = [
        'is_primary' => 'boolean',
        'sort_order' => 'integer'
    ];

    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class);
    }
}