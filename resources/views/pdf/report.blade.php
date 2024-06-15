<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report {{ $from.' - '.$to }}</title>

    <style>
        *{
            padding: 0;
            margin: 15px;
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
        .reservee{
            text-align: center;
            font-size: 25px;
            margin-top: 30px;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            border: 1px solid black;
        }
        th{
            text-align: center;
            background: #d88210
        }
        td{
            text-align: center;
        }
        th,td{
            padding: 5px;
            border: 1px solid black;
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
        <div class="invoice-text">REPORT</div>
    </div>

    <div class="invoice-inside">
        <div><b>Date Received:</b> {{ $today }}</div>
    </div>

    <hr>

    <div class="reservee">
        <div>Reservation Report {{ $from.' - '.$to }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>From</th>
                <th>To</th>
                <th>Booked On</th>
                <th>Booked by</th>
            </tr>
        </thead>
        <tbody>
            @if (count($reservation_details) > 0)
                @foreach ($reservation_details as $reservation)
                    <tr>
                        <td>{{ $reservation->item_name }}</td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>{{ $reservation->created_at }}</td>
                        <td>{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</td>
                    </tr>
                @endforeach
            @else
                    <tr>
                        <td colspan="5" class="p-2 text-center">No Records Found!</td>
                    </tr>
            @endif
        </tbody>
    </table>
</body>
</html>