<?php

namespace App\Filament\Widgets;

use App\Models\Venue;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PopularVenues extends BaseWidget
{
    protected static ?string $heading = 'Popular Venues';
    protected static ?int $sort = 5;
    protected int|string|array $columnSpan = '1/2';
    protected static ?string $maxHeight = '400px';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Venue::withCount(['events', 'events as upcoming_events_count' => function ($query) {
                    $query->where('start_date', '>=', now());
                }])
                    ->orderByDesc('events_count')
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->weight('medium')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('events_count')
                    ->label('Total Events')
                    ->sortable()
                    ->color('success')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('upcoming_events_count')
                    ->label('Upcoming Events')
                    ->sortable()
                    ->color('primary')
                    ->alignCenter(),
            ])
            ->striped()
            ->paginated(false);
    }
}