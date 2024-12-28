@extends('layout.main')
@section('main-section')

<div class="container mt-5">
    <h1 class="text-center mb-4"><i class="fas fa-search"></i> Search for Your Ticket</h1>

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <form action="{{ route('ticket.search') }}" method="POST" class="card p-4 shadow-lg">
                @csrf
                <div class="form-group mb-3">
                    <label for="query" class="form-label"><i class="fas fa-ticket-alt"></i> Enter Ticket ID, Email, or Phone Number:</label>
                    <div class="input-group">
                        <input type="text" id="query" name="query" class="form-control" placeholder="Search by Ticket ID, Email, or Phone" required>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Display error message if any -->
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif
</div>

@endsection
