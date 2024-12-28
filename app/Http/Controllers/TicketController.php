<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;
use Carbon\Carbon;

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

        $totalPrice = ($request->adults * 40) + ($request->children * 30);

        $ticket = Ticket::create([
            'user_name' => $request->user_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'adults' => $request->adults,
            'children' => $request->children ?? 0,
            'total_price' => $totalPrice,
            'reference_number' => strtoupper(Str::random(12)), // Generate 12-character random string
        ]);

        return redirect()->route('ticket.download', $ticket->id)
            ->with('success', 'Ticket booked successfully!');
    }

    // Update transaction number
    public function updateTransactionNumber(Request $request, $id)
    {
        $request->validate([
            'transaction_number' => 'required|string|max:255',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update(['transaction_number' => $request->transaction_number]);

        return redirect()->back()->with('success', 'Transaction number updated successfully!');
    }


    // Show the ticket search form
    public function showSearchForm()
    {
        return view('ticket-search');
    }

    // Handle the search request
    

    public function searchTicket(Request $request)
    {
        $request->validate([
            'query' => 'required|string|max:255',
        ]);
    
        $query = $request->input('query'); // Properly extract the query input
    
        // Get today's date
        $today = Carbon::today();
    
        // Query for tickets with the given email or mobile number, only for today or future dates
        $tickets = Ticket::where(function($queryBuilder) use ($query) {
            $queryBuilder->where('id', $query)
                ->orWhere('email', $query)
                ->orWhere('reference_number', $query)
                ->orWhere('mobile', $query);
        })
        ->where('booking_date', '>=', $today) // Only show bookings today or in the future
        ->get(); // Get all matching tickets
    
        // If no tickets are found
        if ($tickets->isEmpty()) {
            return back()->with('error', 'No tickets found for the given details.');
        }
    
        return view('ticket-search-results', compact('tickets'));
    }
    




    // Download ticket as PDF
    public function downloadTicket($id)
    {
        $ticket = Ticket::findOrFail($id);

        $pdf = PDF::loadView('ticket-pdf', ['ticket' => $ticket]);

        return $pdf->download("Ticket_{$ticket->reference_number}.pdf");
    }
}
