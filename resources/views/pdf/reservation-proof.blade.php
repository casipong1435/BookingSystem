<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reservation Proof</title>

    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .container{
            position: absolute;
            top: 10%;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            border: 1px solid black;

        }
        .holder{
            padding: 0.1rem;
        }
        .form-group-title{
            border-bottom: 1px solid #4d4d4d;
            text-align: center
        }
        .form-group{
            padding: 10px;
            border-bottom: 1px solid #4d4d4d;
        }
        .title{
            font-size: 25px;
        }
        .key{
            text-align: left
        }
        .value{
            text-align: right
        }
        .heading-title{
            font-size: 25px;
            position: absolute;
            top: 30px;
            left: 150px;
        }
        img{
            border-radius: 50%;
            margin-top: 50px;
            margin-left: 50px;
        }
        .invoice{
            position: absolute;
            top: 5%;
            right: 0;
            padding: 10px;
            width: 150px;
            text-align: center;
            background: #e2832a;
        }
        .invoice-text{
            letter-spacing: 5px;
            font-size: 30px;
            color: white;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .invoice-inside{
            margin-left: 50px;
            margin-bottom: 20px;
        }
        .date-received{
            position: absolute;
            top: 13%;
            right: 50px;
        }
        .reservee{
            text-align: center;
            font-size: 25px;
            margin-top: 10px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            padding: 80px;
            margin-top: 10px;
        }
        th{
            text-align: left;
        }
        td{
            text-align: right;
        }
        th,td{
            padding: 15px;
        }
        .booked-by{
            position: absolute;
            bottom: 150px;
            right: 50px;
        }
        .bg-success{
            color: #148841;
        }
        
    </style>
</head>
<body>
    <div>
        <img src="images/about/Tangub.jpg" alt="" height="80" width="80">
        <div class="heading-title">
            <div>City of Tangub</div>
            <div>Tangub City Booking System</div>
        </div>
    </div>

    <div class="invoice">
        <div class="invoice-text">INVOICE</div>
    </div>

    <div class="invoice-inside">
        <div><b>Invoice ID:</b> {{ $accepted_booked->id }}</div>
        <div><b>Booking Created:</b> {{ $accepted_booked->created_at }}</div>
    </div>

    <div class="date-received">
        <div><b>Date Received:</b> {{ $today }}</div>
    </div>

    <hr>

    <div class="reservee">
        <div>Reservation Details</div>
    </div>

    <table>
        <tr>
            <th>Item Name:</th>
            <td>{{ $accepted_booked->item_name }}</td>
        </tr>
        <tr>
            <th>Purpose:</th>
            <td>{{ $accepted_booked->purpose }}</td>
        </tr>
        <tr>
            <th>Status:</th>
            <td class="bg-warning">Pending (Process Payment)</td>
        </tr>
        @if ($item_type == 'equipment' )
            <tr>
                <th>Quantity:</th>
                <td>{{ $accepted_booked->quantity }}</td>
            </tr>
        @endif
        @if ($item_type == 'room' || $item_type == 'facility')
            <tr>
                <th>Description:</th>
                <td>{{ $accepted_booked->price_description }}</td>
            </tr>
            <tr>
                <th>Time:</th>
                <td>{{ $accepted_booked->time }}</td>
            </tr>
        @endif
        <tr>
            <th>Price:</th>
            <td>{{ $accepted_booked->price }}</td>
        </tr>
        <tr>
            <th>From:</th>
            <td>{{ $accepted_booked->start_date }}</td>
        </tr>
        <tr>
            <th>To:</th>
            <td>{{ $accepted_booked->end_date }}</td>
        </tr>
    </table>

    <hr>

    <div class="booked-by">
        <div><b>Booked By:</b></div>
        <div>{{ ucfirst($accepted_booked->first_name).' '.ucfirst($accepted_booked->last_name) }}</div>
    </div>
</body>
</html>