<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use PDF; // Assuming you're using the barryvdh/laravel-dompdf package

class TicketController extends Controller
{
    // Show the booking form
    public function showBookingForm()
    {
        return view('ticket-booking');
    }

    // Store booking details
    public function storeBooking(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
            'booking_date' => 'required|date',
            'booking_time' => 'required|string',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
        ]);

        $totalPrice = ($request->adults * 20) + ($request->children * 10);

        $ticket = Ticket::create([
            'user_name' => $request->user_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'adults' => $request->adults,
            'children' => $request->children ?? 0,
            'total_price' => $totalPrice,
        ]);

        return redirect()->route('ticket.download', $ticket->id)
            ->with('success', 'Ticket booked successfully!');
    }

    // Download ticket as PDF
    public function downloadTicket($id)
    {
        $ticket = Ticket::findOrFail($id);

        $pdf = PDF::loadView('ticket-pdf', ['ticket' => $ticket]);

        return $pdf->download("Ticket_{$ticket->id}.pdf");
    }
}
