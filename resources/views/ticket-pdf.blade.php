<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            padding: 20px;
            border: 1px solid #ddd;
            width: 90%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #4CAF50;
        }
        .details {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }
        .details p {
            margin: 8px 0;
            line-height: 1.5;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }
        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .container {
                width: 100%;
                padding: 10px;
            }
            .header {
                font-size: 24px;
            }
            .details p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Zoo Ticket</div>
        <div class="details">
            <p><strong>Name:</strong> {{ $ticket->user_name }}</p>
            <p><strong>Mobile:</strong> {{ $ticket->mobile }}</p>
            <p><strong>Email:</strong> {{ $ticket->email }}</p>
            <p><strong>Date:</strong> {{ $ticket->booking_date }}</p>
            <p><strong>Time:</strong> {{ $ticket->booking_time }}</p>
            <p><strong>Adults:</strong> {{ $ticket->adults }}</p>
            <p><strong>Children:</strong> {{ $ticket->children }}</p>
            <p><strong>Total Price:</strong> ₹{{ $ticket->total_price }}</p>
        </div>
        <div class="footer">
            Thank you for booking with us! <br>
            <a href="{{ url('/') }}">Visit Our Website</a>
        </div>
    </div>
</body>
</html>
