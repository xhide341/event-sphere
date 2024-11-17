<?php

namespace App\Filament\Widgets;

use App\Models\Speaker;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class TopSpeakers extends BaseWidget
{
    protected static ?int $sort = 6;
    protected int|string|array $columnSpan = '1/2';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Speaker::withCount('events')
                    ->orderByDesc('events_count')
            )
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->circular()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('events_count')
                    ->label('Total Events')
                    ->sortable()
                    ->color('success')
                    ->alignCenter(),
            ])
            ->paginated(true)
            ->defaultPaginationPageOption(5);
    }
}