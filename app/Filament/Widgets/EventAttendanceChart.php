<?php

namespace App\Filament\Widgets;

use App\Models\Registration;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class EventAttendanceChart extends ChartWidget
{
    protected static ?string $heading = 'Event Registrations';
    protected static ?int $sort = 2;
    protected int|string|array $columnSpan = '1/2';
    protected static ?string $maxHeight = '300px';
    protected static ?string $pollingInterval = '30s';

    public ?string $filter = '30';
    
    protected function getFilters(): ?array
    {
        return [
            '7' => 'Last 7 days',
            '30' => 'Last month',
            '90' => 'Last 3 months',
            '365' => 'Last year',
        ];
    }

    protected function getData(): array
    {
        $activeFilter = (int) $this->filter;
        
        $data = Registration::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays($activeFilter))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = collect();
        $startDate = now()->subDays($activeFilter);
        $endDate = now();

        while ($startDate <= $endDate) {
            $dates->push($startDate->format('Y-m-d'));
            $startDate->addDay();
        }

        $filledData = $dates->map(function ($date) use ($data) {
            return $data->firstWhere('date', $date)?->count ?? 0;
        });

        return [
            'datasets' => [
                [
                    'label' => 'Registrations',
                    'data' => $filledData->values()->toArray(),
                    'fill' => 'start',
                    'backgroundColor' => 'rgba(59, 130, 246, 0.5)',
                    'borderColor' => 'rgb(59, 130, 246)',
                    'tension' => 0.3,
                ]
            ],
            'labels' => $dates->map(fn ($date) => Carbon::parse($date)->format('M d'))->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'enabled' => true,
                    'mode' => 'index',
                    'intersect' => false,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
            'interaction' => [
                'intersect' => false,
                'mode' => 'index',
            ],
        ];
    }
}