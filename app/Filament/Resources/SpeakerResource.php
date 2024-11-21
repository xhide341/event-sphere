<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpeakerResource\Pages;
use App\Models\Speaker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SpeakerResource\Widgets\SpeakerStats;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;


class SpeakerResource extends Resource
{
    protected static ?string $model = Speaker::class;
    protected static ?string $navigationIcon = 'heroicon-o-microphone';
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $navigationGroup = 'Event Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Speaker Details')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('phone_number')
                            ->tel()
                            ->maxLength(255),
                        Select::make('availability_status')
                            ->options([
                                'Available' => 'Available',
                                'Tentative' => 'Tentative',
                                'Confirmed' => 'Confirmed',
                                'Cancelled' => 'Cancelled',
                            ])
                            ->default('Available')
                            ->required(),
                    ])->columns(2),

                Section::make('Additional Information')
                    ->schema([
                        Textarea::make('bio')
                            ->rows(4)
                            ->columnSpanFull(),
                        FileUpload::make('avatar')
                            ->image()
                            ->directory('speaker-photos')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Add Speaker'),
            ])
            ->columns([
                ImageColumn::make('avatar')
                    ->circular()
                    ->alignCenter(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),
                TextColumn::make('phone_number')
                    ->searchable()
                    ->alignCenter(),
                BadgeColumn::make('availability_status')
                    ->colors([
                        'success' => 'Available',
                        'warning' => 'Tentative',
                        'primary' => 'Confirmed',
                        'danger' => 'Cancelled',
                    ])
                    ->alignCenter(),
                TextColumn::make('events_count')
                    ->counts('events')
                    ->label('Events')
                    ->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('availability_status')
                    ->options([
                        'Available' => 'Available',
                        'Tentative' => 'Tentative',
                        'Confirmed' => 'Confirmed',
                        'Cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                ViewAction::make()
                    ->modalHeading(fn (Speaker $record): string => "{$record->name}'s Profile")
                    ->form([
                        Section::make('Speaker Details')
                            ->schema([
                                TextInput::make('name')
                                    ->disabled(),
                                TextInput::make('email')
                                    ->disabled(),
                                TextInput::make('phone_number')
                                    ->disabled(),
                                Select::make('availability_status')
                                    ->disabled()
                                    ->options([
                                        'Available' => 'Available',
                                        'Tentative' => 'Tentative',
                                        'Confirmed' => 'Confirmed',
                                        'Cancelled' => 'Cancelled',
                                    ]),
                            ])->columns(2),

                        Section::make('Additional Information')
                            ->schema([
                                Textarea::make('bio')
                                    ->disabled()
                                    ->rows(4)
                                    ->columnSpanFull(),
                            ]),
                    ]),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpeakers::route('/'),
            'create' => Pages\CreateSpeaker::route('/create'),
            'edit' => Pages\EditSpeaker::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            SpeakerStats::class,
        ];
    }
}
