<?php

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TenderController;
use App\Http\Controllers\TicketController;
use App\Models\Tender;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::get('/ticket-booking', [TicketController::class, 'showBookingForm'])->name('ticket.form');
Route::post('/ticket-booking', [TicketController::class, 'storeBooking'])->name('ticket.store');
Route::get('/ticket-download/{id}', [TicketController::class, 'downloadTicket'])->name('ticket.download');


Route::get('/tender', [TenderController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);
Route::get('/gallery/{id}', [GalleryController::class, 'showgallery']);
