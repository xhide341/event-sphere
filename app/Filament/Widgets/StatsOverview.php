<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use App\Models\Registration;
use App\Models\Venue;
use App\Models\Speaker;
use App\Models\Feedback;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Calculate average rating directly
        $averageRating = number_format(Feedback::avg('rating') ?? 0, 1);

        return [
            Stat::make('Total Events', Event::count())
                ->description('Active events: ' . Event::where('status', 'ongoing')->count())
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),
            
            Stat::make('Total Registrations', Registration::count())
                ->description('This month: ' . Registration::whereMonth('created_at', now()->month)->count())
                ->descriptionIcon('heroicon-m-user-group')
                ->color('primary'),
            
            Stat::make('Average Event Rating', $averageRating)
                ->description('Based on ' . Feedback::count() . ' feedbacks')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
            
            Stat::make('Available Venues', Venue::whereDoesntHave('events', function($query) {
                    $query->where('status', 'ongoing');
                })->count())
                ->description('Total Venues: ' . Venue::count())
                ->descriptionIcon('heroicon-m-building-office')
                ->color('info'),
        ];
    }
}
