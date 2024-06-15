<thead>
    <tr>
        <th>No.</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
    </tr>
</thead>
<tbody>
    @if (count($current_reservations) > 0)
        <?php $i = 1; ?>
        @foreach ($current_reservations as $reservation)
            <tr>
                <td data-label="No.">{{ $i++ }}</td>
                <td data-label="Start Date">{{ Carbon\Carbon::parse($reservation->start_date)->format('d-M-Y  g:i:s A' ) }}</td>
                <td data-label="End Date">{{ Carbon\Carbon::parse($reservation->end_date)->format('d-M-Y  g:i:s A' ) }}</td>
                <td data-label="Status">
                    @if ($reservation->status == 0 || $reservation->status == 1)
                        <span class="bg-warning">Pending</span>
                    @else
                        <span class="bg-success">Approved</span>
                    @endif
                </td>
            </tr>
        @endforeach
    @else
    <tr>
        <td data-label="State" colspan="4" class="text-center p-2">No Current Reservation.</td>
    </tr>
    @endif
</tbody>