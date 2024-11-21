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
        // Calculate event statistics
        $totalEvents = Event::count();
        $activeEvents = Event::where('status', 'ongoing')->count();

        // Calculate registration statistics
        $totalRegistrations = Registration::count();
        $thisMonthRegistrations = Registration::whereMonth('created_at', now()->month)->count();
        $lastMonthRegistrations = Registration::whereMonth('created_at', now()->subMonth()->month)->count();
        $registrationColor = match(true) {
            $thisMonthRegistrations > $lastMonthRegistrations * 1.1 => 'success', // 10% growth
            $thisMonthRegistrations >= $lastMonthRegistrations => 'info',
            default => 'danger', // Decline in registrations
        };

        // Calculate rating statistics
        $averageRating = Feedback::avg('rating') ?? 0;
        $formattedRating = number_format($averageRating, 1);
        $ratingColor = match(true) {
            $averageRating >= 4.5 => 'success',
            $averageRating >= 3.5 => 'warning',
            $averageRating >= 2.5 => 'gray',
            default => 'danger',
        };

        // Add historical ratings data
        $lastSixMonthsRatings = Feedback::selectRaw('AVG(rating) as avg_rating')
            ->whereDate('created_at', '>=', now()->subMonths(6))
            ->groupBy(\DB::raw('MONTH(created_at)'))
            ->pluck('avg_rating')
            ->map(fn($rating) => round($rating, 1))
            ->toArray();
        
        // Pad array to exactly 6 elements if needed
        $ratingChart = array_pad($lastSixMonthsRatings, 6, 0);
        $ratingChart[] = $averageRating; // Add current rating as last element

        // Calculate venue statistics
        $totalVenues = Venue::count();
        $availableVenues = Venue::whereDoesntHave('events', function($query) {
            $query->where('status', 'ongoing');
        })->count();
        $venueColor = match(true) {
            $availableVenues <= $totalVenues * 0.2 => 'danger', // Less than 20% available
            $availableVenues <= $totalVenues * 0.5 => 'warning', // Less than 50% available
            default => 'success', // Good availability
        };

        return [
            Stat::make('Total Events', $totalEvents)
                ->description($activeEvents . ' active events (' . number_format(($activeEvents / max(1, $totalEvents)) * 100) . '%)')
                ->descriptionIcon('heroicon-m-calendar')
                ->icon('heroicon-m-building-library')
                ->chart([7, 3, 4, 5, 6, $activeEvents])
                ->color('primary'),
            
            Stat::make('Total Registrations', $totalRegistrations)
                ->description($thisMonthRegistrations . ' this month (' . ($lastMonthRegistrations ? sprintf('%+d%%', (($thisMonthRegistrations - $lastMonthRegistrations) / $lastMonthRegistrations) * 100) : 'N/A') . ' vs last month)')
                ->descriptionIcon('heroicon-m-user-group')
                ->icon('heroicon-m-user-plus')
                ->chart([2, 3, 5, 4, 6, $thisMonthRegistrations])
                ->color($registrationColor),
            
            Stat::make('Average Event Rating', $formattedRating . ' / 5')
                ->description('Based on ' . Feedback::count() . ' feedbacks')
                ->descriptionIcon('heroicon-m-star')
                ->icon('heroicon-m-chart-bar')
                ->chart($ratingChart)
                ->color($ratingColor),
            
            Stat::make('Available Venues', $availableVenues)
                ->description($totalVenues . ' total (' . number_format(($availableVenues / max(1, $totalVenues)) * 100) . '% available)')
                ->descriptionIcon('heroicon-m-building-office')
                ->icon('heroicon-m-map-pin')
                ->chart([3, 4, 3, 5, 4, $availableVenues])
                ->color($venueColor),
        ];
    }
}
