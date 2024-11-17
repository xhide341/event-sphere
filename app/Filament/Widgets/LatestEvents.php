<?php

namespace App\Filament\Widgets;

use App\Models\Event;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestEvents extends BaseWidget
{
    protected static ?int $sort = 4;
    protected int|string|array $columnSpan = 'full';

    protected static ?string $heading = 'Latest Events';
    protected static bool $isLazy = true;
    protected static ?int $limit = 5;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Event::query()
                    ->with(['venue', 'department'])
                    ->latest()
                    ->limit(static::$limit)
            )
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->limit(30)
                    ->alignment('center'),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable()
                    ->alignment('center'),
                Tables\Columns\TextColumn::make('venue.name')
                    ->searchable()
                    ->label('Venue')
                    ->alignment('center'),
                Tables\Columns\TextColumn::make('department.name')
                    ->searchable()
                    ->label('Department')
                    ->alignment('center'),
                Tables\Columns\BadgeColumn::make('status')                    
                    ->alignment('center')                    
                    ->colors([
                        'success' => 'Completed',
                        'warning' => 'Ongoing',
                        'primary' => 'Upcoming',
                        'danger' => 'Archived',
                    ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->defaultSort('start_date', 'desc')
            ->poll('30s');
    }
}