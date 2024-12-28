<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TimetableResource\Pages;
use App\Filament\Resources\TimetableResource\RelationManagers;
use App\Models\Timetable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TimetableResource extends Resource
{
    protected static ?string $model = Timetable::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('heading')
                ->nullable(), // Optional field

            Forms\Components\TimePicker::make('opening_time')
                ->nullable(), // Optional field

            Forms\Components\TimePicker::make('closing_time')
                ->nullable(), // Optional field

            Forms\Components\Textarea::make('description')
                ->nullable(), // Optional field
        ]);
    }

    public static function table(Table $table): Table
    {
        
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('heading')
                ->sortable(),

            Tables\Columns\TextColumn::make('opening_time')
                ->sortable()
                ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('H:i') : 'N/A'),

            Tables\Columns\TextColumn::make('closing_time')
                ->sortable()
                ->formatStateUsing(fn ($state) => $state ? \Carbon\Carbon::parse($state)->format('H:i') : 'N/A'),

            Tables\Columns\TextColumn::make('description')
                ->limit(50), // Limit the description length displayed in the table
        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListTimetables::route('/'),
            'create' => Pages\CreateTimetable::route('/create'),
            'edit' => Pages\EditTimetable::route('/{record}/edit'),
        ];
    }
}
