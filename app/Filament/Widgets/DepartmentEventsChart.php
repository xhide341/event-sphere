<?php

namespace App\Filament\Widgets;

use App\Models\Department;
use Filament\Widgets\ChartWidget;

class DepartmentEventsChart extends ChartWidget
{
    protected static ?string $heading = 'Events by Department';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = '1/2';
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        $departments = Department::withCount('events')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Number of Events',
                    'data' => $departments->pluck('events_count')->toArray(),
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                    ],
                ]
            ],
            'labels' => $departments->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
