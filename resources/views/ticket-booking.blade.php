@extends('layout.main')

@section('main-section')
<div class="bg-image1" style="height: 100px;"></div>
<div class="container py-5" style="margin-top: 10px; margin-bottom: 20px; background-image: url('{{ asset('front/img/Hero.jpg') }}'); background-size: cover; background-position: center;">
    <div class="row justify-content-center">
        <div class="col-md-8 bg-white p-4 rounded-lg shadow-lg">
            <h2 class="text-center text-primary mb-4">Zoo Ticket Booking</h2>

            <form action="{{ route('ticket.store') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="form-group mb-3">
                    <label for="user_name" class="form-label">Your Name</label>
                    <input type="text" name="user_name" placeholder="Name" class="form-control" value="{{ old('user_name') }}" required>
                    @error('user_name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mobile Field -->
                <div class="form-group mb-3">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" value="{{ old('mobile') }}" required>
                    @error('mobile')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="form-group mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" placeholder="Email ID" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Date Picker -->
                <div class="form-group mb-3">
                    <label for="booking_date" class="form-label">Booking Date</label>
                    <input type="date" name="booking_date" class="form-control" value="{{ old('booking_date') }}" required min="{{ \Carbon\Carbon::today()->toDateString() }}" max="{{ \Carbon\Carbon::today()->addDays(5)->toDateString() }}">
                    @error('booking_date')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Time Picker -->
                <div class="form-group mb-3">
                    <label for="booking_time" class="form-label">Booking Time</label>
                    <select name="booking_time" class="form-control" required>
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
                    <label for="adults" class="form-label">Number of Adults</label>
                    <input type="number" name="adults" placeholder="Number of Adults" id="adults" class="form-control" value="{{ old('adults') }}" required min="1" onchange="updateTotalPrice()">
                </div>

                <div class="form-group mb-3">
                    <label for="children" class="form-label">Number of Children</label>
                    <input type="number" placeholder="Number of Children" name="children" id="children" class="form-control" value="{{ old('children') }}" min="0" onchange="updateTotalPrice()">
                </div>

                <!-- Total Price -->
                <div class="form-group mb-3">
                    <label for="total_price" class="form-label">Total Price</label>
                    <div id="total_price" class="font-weight-bold">₹0</div>
                    <!-- Hidden Input for Total Price -->
                    <input type="hidden" name="total_price" id="total_price_input" value="0">
                </div>

                <!-- Submit Button -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-4">Book Ticket</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Calculate the total price
    function updateTotalPrice() {
        const adultPrice = 40; // ₹40 per adult
        const childPrice = 30; // ₹30 per child

        // Get values of adults and children from the input fields
        const adults = parseInt(document.getElementById('adults').value) || 0; // Default to 0 if empty or NaN
        const children = parseInt(document.getElementById('children').value) || 0; // Default to 0 if empty or NaN

        // Calculate the total price
        const totalPrice = (adults * adultPrice) + (children * childPrice); 
        console.log(totalPrice);

        // Update the displayed total price
        document.getElementById('total_price').innerHTML = '₹' + totalPrice;

        // Update the hidden input for total price
        document.getElementById('total_price_input').value = totalPrice;
    }

    // Initialize price calculation on page load
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

    @media (max-width: 768px) {
        .form-control {
            font-size: 0.9rem;
            padding: 8px;
        }

        .btn-primary {
            font-size: 0.9rem;
            padding: 10px 20px;
        }
    }
</style>

@endsection
