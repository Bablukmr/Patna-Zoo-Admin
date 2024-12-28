<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patna Zoo Ticket</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .a4-container {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 20px;
            box-sizing: border-box;
            background-color: #ffffff;
            border: 1px solid #ddd;
        }

        .header,
        .details,
        .visitor-details,
        .payment-details,
        .footer {
            margin-bottom: 15px;
            page-break-inside: avoid;
        }

        .header img {
            width: 80px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .header h1 {
            font-size: 22px;
            color: #4CAF50;
            margin: 5px 0;
            text-align: center;
        }

        .header h2 {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f1f1f1;
        }

        .qr-code {
            text-align: center;
            margin-top: 20px;
        }

        .qr-code img {
            width: 100px;
            height: 100px;
        }

        .footer {
            font-size: 12px;
            color: #555;
            line-height: 1.4;
        }

        .footer p {
            margin: 2px 0;
        }
    </style>
</head>

<body>
    <div class="a4-container">
        <div class="header">
            <img src="{{ asset('images/patna_zoo_logo.png') }}" alt="Patna Zoo Logo">
            <h1>PATNA ZOO SAFARI</h1>
            <h2>Ticket Confirmation</h2>
        </div>
        <div class="details">
            <table>
                <tr>
                    <th>Booking ID</th>
                    <td>{{ $ticket->booking_id }}</td>
                    <th>Date/Time of Visit</th>
                    <td>{{ $ticket->booking_date }} {{ $ticket->booking_time }}</td>
                </tr>
                <tr>
                    <th>Date of Booking</th>
                    <td>{{ $ticket->date_of_booking }}</td>
                    <th>Package</th>
                    <td>Integrated Package</td>
                </tr>
                <tr>
                    <th>Communication Details</th>
                    <td colspan="3">{{ $ticket->email }}, {{ $ticket->mobile }}</td>
                </tr>
            </table>
        </div>
        <div class="visitor-details">
            <h3>Visitor Details</h3>
            <table>
                <tr>
                    <th>S.No.</th>
                    <th>Name</th>
                    <th>Age Group</th>
                    <th>Age/DOB</th>
                    <th>Gender</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>{{ $ticket->user_name }}</td>
                    <td>Adult</td>
                    <td>{{ $ticket->age }}</td>
                    <td>{{ $ticket->gender }}</td>
                </tr>
            </table>
        </div>
        <div class="payment-details">
            <h3>Payment Details</h3>
            <table>
                <tr>
                    <th>Age Group</th>
                    <th>No.</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                </tr>
                <tr>
                    <td>Person</td>
                    <td>{{ $ticket->adults }}</td>
                    <td>₹ 40.00</td>
                    <td>₹ {{ $ticket->adults * 40 }}</td>
                </tr>
                <tr>
                    <td>Child</td>
                    <td>{{ $ticket->children }}</td>
                    <td>₹ 30.00</td>
                    <td>₹ {{ $ticket->children * 30 }}</td>
                </tr>
                <tr>
                    <th colspan="3" style="text-align: right;">Total Payment</th>
                    <th>₹ {{ $ticket->total_price }}</th>
                </tr>
            </table>
        </div>
        <div class="qr-code">
            <p>Scan the QR code for entry verification:</p>
            <!-- Include the QR Code in the PDF -->
            <img src="{{ public_path('qrcodes/' . $ticket->transaction_id . '.png') }}" alt="QR Code">
        </div>
        <div class="footer">
            <h5>Important Information</h5>
            <p>1. Please arrive 30 minutes prior to your scheduled time.</p>
            <p>2. Carry a valid government-issued ID proof.</p>
            <p>3. No refund is allowed for late arrivals or no-shows.</p>
            <p>4. Follow all zoo rules for a safe and enjoyable visit.</p>
            <p>5. Avoid feeding or teasing the animals inside the premises.</p>
            <p>6. Contact our customer care for queries: 800-233-9684.</p>
            <p>7. Unauthorized reselling of tickets is prohibited.</p>
            <p>8. Pets, alcohol, and weapons are not allowed on the premises.</p>
            <p>9. Photography may be restricted in certain areas.</p>
            <p>10. Thank you for visiting Patna Zoo! Enjoy your day!</p>
        </div>
    </div>
</body>

</html>