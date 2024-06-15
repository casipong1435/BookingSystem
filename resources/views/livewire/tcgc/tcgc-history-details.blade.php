<div>
    <div class="col-md-12 p-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

    <div class="col-md-12 text-center">
        <h2 class=" mb-2">{{ $item_name }}</h2>
        <img src="{{ asset('images/tcgc-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
   </div>

   <hr>

   <div class="col-md-12 mt-3 p-1 text-center">
    <h2 class="mb-2">Current Reservations</h2>
    <table cellpadding="10">
        <thead>
            <tr>
                <th>No.</th>
                <th>Activity</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Booked on</th>
                <th>Institute</th>
                <th>Booked By</th>
            </tr>
        </thead>
        <tbody>
            @if (count($current_reservations) > 0)
                <?php $i = 1; ?>
                @foreach ($current_reservations as $reservation)
                    <tr>
                        <td data-label="No.">{{ $i++ }}</td>
                        <td data-label="Activity">{{ $reservation->activity }}</td>
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
                        <td data-label="Institute">{{ $reservation->institute }}</td>
                        <td data-label="Booked by">{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</td>
                    </tr>
                @endforeach
            @else
            <tr>
                <td data-label="State" colspan="8" class="text-center p-2">No Reservation History.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

</div>
