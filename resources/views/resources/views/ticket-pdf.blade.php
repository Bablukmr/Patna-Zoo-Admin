<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Details</title>
</head>
<body>
    <h1>Ticket Details</h1>
    
    @foreach($tickets as $ticket)
        <div>
            <p><strong>Ticket ID:</strong> {{ $ticket->id }}</p>
            <p><strong>User Name:</strong> {{ $ticket->user_name }}</p>
            <p><strong>Email:</strong> {{ $ticket->email }}</p>
            <p><strong>Phone:</strong> {{ $ticket->mobile }}</p>
            <p><strong>Booking Date:</strong> {{ $ticket->booking_date }}</p>
            <p><strong>Booking Time:</strong> {{ $ticket->booking_time }}</p>
            <p><strong>Total Price:</strong> ₹{{ $ticket->total_price }}</p>
            <hr>
        </div>
    @endforeach

</body>
</html>
