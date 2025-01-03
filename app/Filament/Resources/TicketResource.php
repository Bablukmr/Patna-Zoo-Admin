<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TicketResource\Pages;
use App\Models\Ticket;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Support\Facades\PDF;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;
    protected static ?string $navigationIcon = 'heroicon-o-ticket';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_name')->required(),
                Forms\Components\TextInput::make('mobile')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\DatePicker::make('booking_date')->required(),
                Forms\Components\Select::make('booking_time')
                    ->options(array_combine(
                        array_map(fn($hour) => "$hour:00", range(10, 17)),
                        array_map(fn($hour) => "$hour:00", range(10, 17))
                    )),
                Forms\Components\TextInput::make('adults')->numeric()->required(),
                Forms\Components\TextInput::make('children')->numeric(),
                Forms\Components\TextInput::make('total_price')->numeric()->disabled(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('mobile')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('booking_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('booking_time')->sortable(),
                Tables\Columns\TextColumn::make('adults')->sortable(),
                Tables\Columns\TextColumn::make('children')->sortable(),
                Tables\Columns\TextColumn::make('total_price')->money('INR')->sortable(),
            ])
            ->filters([])
            ->actions([]) // Removed Edit and Delete actions
            ->bulkActions([
                BulkAction::make('download_selected')
                    ->label('Download Selected Tickets')
                    ->action(function ($records) {
                        // Generate PDF with the selected tickets
                        $pdf = PDF::loadView('ticket-pdf', ['tickets' => $records]);

                        // Return the generated PDF as a downloadable response
                        return response()->stream(
                            function () use ($pdf) {
                                echo $pdf->output();
                            },
                            200,
                            [
                                "Content-Type" => "application/pdf",
                                "Content-Disposition" => "attachment; filename=tickets.pdf",
                            ]
                        );
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            // Remove 'create' and 'edit' pages
        ];
    }
}
