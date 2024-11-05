<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Filament\Resources\EventResource\RelationManagers;
use App\Models\Event;
use App\Models\Venue;
use App\Models\Department;
use App\Models\Speaker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\DatePicker;


class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Event Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        RichEditor::make('description')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                        DateTimePicker::make('start_date')
                            ->required()
                            ->native(false)
                            ->afterOrEqual(now()),
                        DateTimePicker::make('end_date')
                            ->required()
                            ->after('start_date'),
                        Select::make('venue_id')
                            ->label('Venue')
                            ->options(Venue::all()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        Select::make('department_id')
                            ->label('Department')
                            ->options(Department::all()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        Select::make('speaker_id')
                            ->label('Speaker')
                            ->options(Speaker::all()->pluck('name', 'id'))
                            ->searchable()
                            ->preload(),
                        FileUpload::make('image')
                            ->image()
                            ->directory('events')
                            ->columnSpanFull(),
                        Select::make('status')
                            ->options([
                                'Upcoming' => 'Upcoming',
                                'Ongoing' => 'Ongoing',
                                'Completed' => 'Completed',
                                'Archived' => 'Archived',
                            ])
                            ->required()
                            ->default('Upcoming'),
                        Select::make('capacity')
                            ->numeric()
                            ->minValue(1)
                            ->required(),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('s3')
                    ->defaultImageUrl('/storage/image_placeholder.jpg')
                    ->square(),
                TextColumn::make('name')
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('venue.name')
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('department.name')
                    ->searchable()
                    ->alignCenter(),
                TextColumn::make('speaker.name')
                    ->searchable()
                    ->alignCenter(),
                BadgeColumn::make('status')
                    ->alignCenter()
                    ->colors([
                        'success' => 'Completed',
                        'warning' => 'Ongoing',
                        'primary' => 'Upcoming',
                        'danger' => 'Archived',
                    ]),
                TextColumn::make('users_count')
                    ->counts('users')
                    ->label('Registrations')
                    ->alignCenter(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Upcoming' => 'Upcoming',
                        'Ongoing' => 'Ongoing',
                        'Completed' => 'Completed',
                        'Archived' => 'Archived',
                    ]),
                Tables\Filters\SelectFilter::make('department')
                    ->relationship('department', 'name'),
                Tables\Filters\SelectFilter::make('venue')
                    ->relationship('venue', 'name'),
                Tables\Filters\Filter::make('upcoming')
                    ->query(fn (Builder $query): Builder => $query->where('start_date', '>', now())),
                Tables\Filters\Filter::make('past')
                    ->query(fn (Builder $query): Builder => $query->where('end_date', '<', now())),
                Tables\Filters\Filter::make('date_range')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('until'),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
