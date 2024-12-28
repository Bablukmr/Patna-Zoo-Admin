@extends('layout.main')
@section('main-section')

<div class="container mt-5 ">
    <h1 class="text-center mb-4">Ticket Found</h1>

    <!-- Display a single ticket if only one result is found -->
    @if(isset($ticket))
        <div class="card mb-4 shadow-lg bg-white">
            <div class="card-header bg-primary text-white">
                <h4><i class="fas fa-ticket-alt"></i> Ticket Details</h4>
            </div>
            <div class="card-body">
                <p><strong><i class="fas fa-id-badge"></i> Ticket ID:</strong> {{ $ticket->id }}</p>
                <p><strong><i class="fas fa-user"></i> User Name:</strong> {{ $ticket->user_name }}</p>
                <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $ticket->email }}</p>
                <p><strong><i class="fas fa-phone-alt"></i> Phone:</strong> {{ $ticket->mobile }}</p>
                <p><strong><i class="fas fa-calendar-day"></i> Booking Date:</strong> {{ $ticket->booking_date }}</p>
                <p><strong><i class="fas fa-clock"></i> Booking Time:</strong> {{ $ticket->booking_time }}</p>
                <p><strong><i class="fas fa-money-bill-wave"></i> Total Price:</strong> ₹{{ $ticket->total_price }}</p>
                <a href="{{ route('ticket.download', $ticket->id) }}" class="btn btn-success"><i class="fas fa-download"></i> Download Ticket as PDF</a>
            </div>
        </div>
    @endif

    <!-- Display multiple tickets if there are multiple results -->
    @if($tickets->count() > 0)
        <ul class="list-group">
            @foreach($tickets as $ticket)
                <li class="list-group-item mb-3 shadow-sm bg-white">
                    <h5 class="d-flex justify-content-between align-items-center">
                        <span><i class="fas fa-ticket-alt"></i> Ticket Reference: {{ $ticket->reference_number }}</span>
                        <a href="{{ route('ticket.download', $ticket->id) }}" class="btn btn-info btn-sm"><i class="fas fa-download"></i> Download</a>
                    </h5>
                    <p><strong><i class="fas fa-user"></i> Name:</strong> {{ $ticket->user_name }}</p>
                    <p><strong><i class="fas fa-calendar-day"></i> Booking Date:</strong> {{ $ticket->booking_date }}</p>
                    <p><strong><i class="fas fa-clock"></i> Booking Time:</strong> {{ $ticket->booking_time }}</p>
                    <p><strong><i class="fas fa-child"></i> Adults:</strong> {{ $ticket->adults }}</p>
                    <p><strong><i class="fas fa-child"></i> Children:</strong> {{ $ticket->children }}</p>
                    <p><strong><i class="fas fa-money-bill-wave"></i> Total Price:</strong> ₹{{ $ticket->total_price }}</p>
                    <p><strong><i class="fas fa-credit-card"></i> Transaction Number:</strong> {{ $ticket->transaction_number }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <div class="alert alert-warning mt-4">
            <strong><i class="fas fa-exclamation-circle"></i> No tickets found.</strong>
        </div>
    @endif

</div>

@endsection
