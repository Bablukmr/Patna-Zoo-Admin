<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DirectorResource\Pages;
use App\Filament\Resources\DirectorResource\RelationManagers;
use App\Models\Director;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DirectorResource extends Resource
{
    protected static ?string $model = Director::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([

                    TextInput::make('name')
                        ->label('Director Name')
                        ->required()
                        ->placeholder('Enter full name')
                        ->columnSpanFull(),

                    FileUpload::make('image')
                        ->label('Profile Picture')
                        ->image()
                        ->directory('directors/images')
                        ->required(),

                    TextInput::make('short_desc')
                        ->label('Short Description')
                        ->required()
                        ->placeholder('Enter a brief description'),

                    RichEditor::make('description')
                        ->label('Detailed Description')
                        ->required()
                        ->placeholder('Provide a detailed description')
                        ->disableToolbarButtons(['codeBlock']) // Optional: Customize toolbar
                        ->columnSpanFull(),

                    Toggle::make('status')
                        ->label('Active Status')
                        ->inline(false)
                        ->onColor('success')
                        ->offColor('danger'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name'),
                TextColumn::make('short_desc')->label('Description'),
                IconColumn::make('status')
                ->label('Status')
                ->boolean()  // Ensures it's a boolean column
                ->sortable()
                ->icon(function ($state) {
                    return $state ? 'heroicon-o-check-circle' : 'heroicon-o-x-circle';  // Active/Inactive icons
                })
                ->color(function ($state) {
                    return $state ? 'success' : 'danger';  // Green for active, red for inactive
                })
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
            'index' => Pages\ListDirectors::route('/'),
            'create' => Pages\CreateDirector::route('/create'),
            'edit' => Pages\EditDirector::route('/{record}/edit'),
        ];
    }
}
