<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenderResource\Pages;
use App\Filament\Resources\TenderResource\RelationManagers;
use App\Models\Tender;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenderResource extends Resource
{
    protected static ?string $model = Tender::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('tender_name')
                ->label('Tender Name')
                ->required()
                ->placeholder('Enter the tender name'),

            TextInput::make('tender_notice_no')
                ->label('Tender Notice No.')
                ->required()
                ->placeholder('Enter the tender notice number'),

            DatePicker::make('tender_date')
                ->label('Tender Date')
                ->required(),

            FileUpload::make('pdf')
                ->label('Upload Tender PDF')
                ->disk('public') // Save to storage/public
                ->directory('tenders/pdfs') // Store in tenders/pdfs directory
                ->acceptedFileTypes(['application/pdf'])
                ->required(),

            Toggle::make('active')
                ->label('Active/Inactive')
                ->default(true)  // Default to active (true)
                ->onColor('success')
                ->offColor('danger')
                ->inline(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('tender_name')->label('Tender Name'),
            TextColumn::make('tender_notice_no')->label('Tender Notice No.'),
            TextColumn::make('tender_date')->label('Tender Date'),
            // LinkColumn::make('pdf')->label('PDF')
            //     ->url(fn (Tender $record) => asset('storage/' . $record->pdf)),
            IconColumn::make('active')
                ->label('Active Status')
                ->boolean()
                ->sortable(),
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
            'index' => Pages\ListTenders::route('/'),
            'create' => Pages\CreateTender::route('/create'),
            'edit' => Pages\EditTender::route('/{record}/edit'),
        ];
    }
}
