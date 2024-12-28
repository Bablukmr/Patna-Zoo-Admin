<!-- resources/views/ticket-booking-success.blade.php -->

<h1>Booking Successful!</h1>
<p>Thank you for booking your ticket. Your transaction ID is: {{ $ticket->transaction_id }}</p>
<p>You can download your ticket from <a href="{{ route('ticket.download', $ticket->id) }}">here</a>.</p>
