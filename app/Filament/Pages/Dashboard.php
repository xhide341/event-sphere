<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\LatestEvents;
use App\Filament\Widgets\PopularVenues;
use App\Filament\Widgets\EventAttendanceChart;
use App\Filament\Widgets\DepartmentEventsChart;
use App\Filament\Widgets\TopSpeakers;

class Dashboard extends BaseDashboard
{
    public function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }

    public function getWidgets(): array
    {
        return [
            EventAttendanceChart::class,
            DepartmentEventsChart::class,
            LatestEvents::class,
            PopularVenues::class,
            TopSpeakers::class,
        ];
    }
}
