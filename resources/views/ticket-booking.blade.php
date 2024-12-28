@extends('layout.main')

@section('main-section')


<div class="container py-5" style="margin-top: 10px; margin-bottom: 20px; background-image: url('{{ asset('front/img/Hero.jpg') }}'); background-size: cover; background-position: center;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 bg-white p-4 rounded-lg shadow-lg">
            <h2 class="text-center text-primary mb-4"><i class="fas fa-ticket-alt"></i> Zoo Ticket Booking</h2>

            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="form-group mb-3">
                    <label for="user_name" class="form-label"><i class="fas fa-user"></i> Your Name</label>
                    <input type="" name="user_name" placeholder="Name" class="form-control" value="{{ old('user_name') }}" required id="user_name">
                    @error('user_name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mobile Field -->
                <div class="form-group mb-3">
                    <label for="mobile" class="form-label"><i class="fas fa-phone-alt"></i> Mobile</label>
                    <input type="" name="mobile" placeholder="Mobile Number" class="form-control" value="{{ old('mobile') }}" required id="mobile">
                    @error('mobile')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" name="email" placeholder="Email ID" class="form-control" value="{{ old('email') }}" required id="email">
                    @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date Picker -->
                <div class="form-group mb-3">
                    <label for="booking_date" class="form-label"><i class="fas fa-calendar-alt"></i> Booking Date</label>
                    <input type="date" name="booking_date" class="form-control" value="{{ old('booking_date') }}" required min="{{ \Carbon\Carbon::today()->toDateString() }}" max="{{ \Carbon\Carbon::today()->addDays(5)->toDateString() }}" id="booking_date">
                    @error('booking_date')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Time Picker -->
                <div class="form-group mb-3">
                    <label for="booking_time" class="form-label"><i class="fas fa-clock"></i> Booking Time</label>
                    <select name="booking_time" class="form-control" required id="booking_time">
                        @for ($hour = 10; $hour <= 17; $hour++)
                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:00</option>
                            <option value="{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:30">{{ str_pad($hour, 2, '0', STR_PAD_LEFT) }}:30</option>
                            @endfor
                    </select>
                    @error('booking_time')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Number of Persons -->
                <div class="form-group mb-3">
                    <label for="adults" class="form-label"><i class="fas fa-users"></i> Number of Adults</label>
                    <input type="number" name="adults" placeholder="Number of Adults" id="adults" class="form-control" value="{{ old('adults') }}" required min="1" onchange="updateTotalPrice()">
                </div>

                <div class="form-group mb-3">
                    <label for="children" class="form-label"><i class="fas fa-child"></i> Number of Children</label>
                    <input type="number" placeholder="Number of Children" name="children" id="children" class="form-control" value="{{ old('children') }}" min="0" onchange="updateTotalPrice()">
                </div>

                <!-- Total Price -->
                <div class="form-group mb-3">
                    <label for="total_price" class="form-label"><i class="fas fa-money-bill-wave"></i> Total Price</label>
                    <div id="total_price" class="font-weight-bold">₹0</div>
                    <input type="hidden" name="total_price" id="total_price_input" value="0">
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-4">Book Ticket</button>
                </div>
            </form>
        </div>
    </div>
    <div class="text-center mt-3">
        <a href="/ticket-search" class="btn btn-success btn-lg">
            <i class="fas fa-download"></i> Download Ticket
        </a>
    </div>
</div>

<script>
    // Calculate the total price
    function updateTotalPrice() {
        const adultPrice = 40; // ₹40 per adult
        const childPrice = 30; // ₹30 per child

        const adults = parseInt(document.getElementById('adults').value) || 0;
        const children = parseInt(document.getElementById('children').value) || 0;

        const totalPrice = (adults * adultPrice) + (children * childPrice);

        document.getElementById('total_price').innerHTML = '₹' + totalPrice;
        document.getElementById('total_price_input').value = totalPrice;

        document.getElementById('preview-price').innerText = '₹' + totalPrice;

        updatePreview(); // Update the preview every time the price changes
    }

    // Initialize price calculation and preview on page load
    window.onload = updateTotalPrice;
</script>

<style>
    .container {
        max-width: 100%;
    }

    .bg-white {
        background-color: #ffffff !important;
    }

    .rounded-lg {
        border-radius: 10px;
    }

    .shadow-lg {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .form-group label {
        font-size: 1rem;
        font-weight: 500;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .card ul {
        list-style-type: none;
        padding-left: 0;
    }

    .card ul li {
        margin-bottom: 10px;
    }

    .card ul li strong {
        color: #333;
    }

    @media (max-width: 768px) {
        .form-control {
            font-size: 0.9rem;
            padding: 8px;
        }

        .btn-primary {
            font-size: 0.9rem;
            padding: 10px 20px;
        }

        .col-md-4 {
            margin-top: 20px;
        }
    }
</style>
@endsection