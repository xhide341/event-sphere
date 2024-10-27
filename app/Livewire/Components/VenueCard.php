<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Venue;
use Illuminate\Support\Facades\Storage;

class VenueCard extends Component
{
    protected $layout = 'layouts.app';
    
    public Venue $venue;
    protected array $venueData = [];
    
    public function mount(Venue $venue)
    {
        $this->venue = $venue->load(['primaryImage', 'images']);
        $this->setVenueData();
    }
    
    protected function setVenueData(): void
    {
        // Add more detailed debugging
        \Log::info('Venue Debug:', [
            'venue_id' => $this->venue->id,
            'has_primary_image' => isset($this->venue->primaryImage),
            'primary_image_full' => $this->venue->primaryImage,
            'primary_image_path' => $this->venue->primaryImage?->path,
            'all_images_count' => $this->venue->images->count(),
            'all_images' => $this->venue->images->toArray()
        ]);

        $this->venueData = [
            'isAvailable' => $this->venue->isAvailable(),
            'currentEvent' => $this->venue->getCurrentEvent(),
            'primaryImage' => 'storage/' . ($this->venue->primaryImage?->path ?? 'venues/default/noimage.webp'),
            'galleryImages' => $this->venue->images
                ->filter(fn($image) => !$image->is_primary)
                ->map(function($image) {
                    return [
                        'url' => 'storage/' . $image->path,
                        'alt' => $this->venue->name
                    ];
                })
        ];

        // Debug the final venueData
        \Log::info('Final VenueData:', $this->venueData);
    }

    public function render()
    {
        return view('livewire.components.venue-card', $this->venueData);
    }
}
