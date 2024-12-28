<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\TicketController;
use App\Models\Tender;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Ticket Booking Routes
Route::get('/ticket-booking', [TicketController::class, 'showBookingForm'])->name('ticket.form');
Route::post('/ticket-booking', [TicketController::class, 'storeBooking'])->name('ticket.store');
Route::get('/ticket-download/{id}', [TicketController::class, 'downloadTicket'])->name('ticket.download');
Route::post('/update-transaction/{id}', [TicketController::class, 'updateTransactionNumber'])->name('ticket.updateTransaction');

// Ticket Search Routes
Route::get('/ticket-search', [TicketController::class, 'showSearchForm'])->name('ticket.search.form');
Route::post('/ticket-search', [TicketController::class, 'searchTicket'])->name('ticket.search');

// Tender and Gallery Routes
Route::get('/tender', [TenderController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{id}', [GalleryController::class, 'showgallery']);
