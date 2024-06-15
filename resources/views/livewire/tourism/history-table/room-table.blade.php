<div class="col-md-12 mt-3 p-1 text-center">
    <h2 class="mb-2">Current Reservations</h2>
    <table cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Time</th>
                <th>w/Aircon</th>
                <th>Price Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Booked on</th>
                <th>Booked By</th>
            </tr>
        </thead>
        <tbody>
            @if (count($current_reservations) > 0)
                <?php $i = 1; ?>
                @foreach ($current_reservations as $reservation)
                    <tr>
                        <td data-label="No.">{{ $i++ }}</td>
                        <td data-label="Time">{{ $reservation->time }}</td>
                        <td data-label="w/Aircon">{{ $reservation->aircon }}</td>
                        <td data-label="Price Description">{{ $reservation->price_description }}</td>
                        <td data-label="Price">{{ $reservation->price }}</td>
                        <td data-label="Quantity">{{ $reservation->quantity }}</td>
                        <td data-label="Start Date">{{ $reservation->start_date }}</td>
                        <td data-label="End Date">{{ $reservation->end_date }}</td>
                        <td data-label="Status">
                            @if ($reservation->status == 3)
                                <span class="bg-success">Finished</span>
                            @else
                                <span class="bg-danger">Rejected</span>
                            @endif
                        </td>
                        <td data-label="Booked on">{{ $reservation->created_at }}</td>
                        <td data-label="Booked by">{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td data-label="State" colspan="11" class="text-center p-2">No Reservation History.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>