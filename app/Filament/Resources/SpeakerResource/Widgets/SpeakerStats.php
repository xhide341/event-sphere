<?php

namespace App\Filament\Resources\SpeakerResource\Widgets;

use App\Models\Speaker;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class SpeakerStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Speakers', Speaker::count())
                ->description('Total number of speakers')
                ->descriptionIcon('heroicon-m-user-group')
                ->color('success'),
                
            Stat::make('Available Speakers', Speaker::where('availability_status', 'Available')->count())
                ->description('Speakers ready for events')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
                
            Stat::make('Confirmed Speakers', Speaker::where('availability_status', 'Confirmed')->count())
                ->description('Currently booked speakers')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('primary'),
                
            Stat::make('Average Events per Speaker', function() {
                $totalSpeakers = Speaker::count();
                if ($totalSpeakers === 0) return 0;
                
                return number_format(
                    Speaker::withCount('events')->get()->avg('events_count'),
                    1
                );
            })
                ->description('Events participation rate')
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('info'),
        ];
    }
}