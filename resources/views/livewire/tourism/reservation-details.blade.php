<div>
     <div class="col-md-12 p-3">
         <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
     </div>
    <div class="col-md-12 text-center">
         <h2 class=" mb-2">{{ $item_name }}</h2>
         <img src="{{ asset('images/tourism-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
    </div>
 
    <hr>
 
   <div class="col-md-12 mt-2 text-center">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-5 m-1 border">
                <div class="form-group p-1 border-bottom text-center fw-bold mb-2">
                    <span>Reservation Details</span>
                </div>
                <div class="form-group d-flex justify-content-between p-2">
                    <div class="fw-bold">Status</div>
                    @if ($status == 0)
                        <div class="bg-warning">Pending</div>
                    @elseif ($status == 1)
                        <div class="bg-warning">Pending (Needs ADmin Approval)</div>
                    @elseif ($status == 2)
                        <div class="bg-success">Approved</div>
                    @elseif ($status == 3)
                        <div class="bg-success">Finished</div>
                    @else
                        <div class="bg-danger">Rejected</div>
                    @endif
                </div>
                @if ($purpose != null)
                    <div class="form-group d-flex justify-content-between p-2">
                        <div class="fw-bold">Purpose</div>
                        <div class="">{{ $purpose }}</div>
                    </div>
                @endif
                @if ($aircon != null)
                    <div class="form-group d-flex justify-content-between p-2">
                        <div class="fw-bold">W/Aircon</div>
                        <div class="">{{ ucfirst($aircon) }}</div>
                    </div>
                @endif
                @if ($time != null)
                    <div class="form-group d-flex justify-content-between p-2">
                        <div class="fw-bold">Time</div>
                        <div class="">{{ $time }}</div>
                    </div>
                @endif
                @if ($price_description != null)
                    <div class="form-group d-flex justify-content-between p-2">
                        <div class="fw-bold">Price Description</div>
                        <div class="">{{ $price_description }}</div>
                    </div>
                @endif
                <div class="form-group d-flex justify-content-between p-2">
                    <div class="fw-bold">Quantity</div>
                    <div class="">{{ $quantity }}</div>
                </div>
                <div class="form-group d-flex justify-content-between p-2">
                    <div class="fw-bold">Price</div>
                    <div class="">{{ $price }}</div>
                </div>
                <div class="form-group d-flex justify-content-between p-2">
                    <div class="fw-bold">From</div>
                    <div class="">{{ Carbon\Carbon::parse($from)->format('d-M-Y  g:i:s A' ) }}</div>
                </div>
                <div class="form-group d-flex justify-content-between p-2">
                    <div class="fw-bold">To</div>
                    <div class="">{{ Carbon\Carbon::parse($to)->format('d-M-Y  g:i:s A' ) }}</div>
                </div>
            </div>
            <div class="col-lg-5 m-1 border">
                <div class="form-group">
                    <div class="form-group p-1 border-bottom text-center fw-bold mb-2">
                        <span>User Details</span>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group p-1 text-center mb-2">
                                <img src="{{ asset('images/id/'.$user_img) }}" alt="" width="100" height="100" onclick="change(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group p-1 text-center mb-2">
                                <img src="{{ asset('images/id/'.$back_img) }}" alt="" width="100" height="100" onclick="change(this)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group d-flex justify-content-between p-2">
                            <div class="fw-bold">Name</div>
                            <div class="">{{ $name }}</div>
                        </div>
                        <div class="form-group d-flex justify-content-between p-2">
                            <div class="fw-bold">Birth Date</div>
                            <div class="">{{ $birth_date }}</div>
                        </div>
                        <div class="form-group d-flex justify-content-between p-2">
                            <div class="fw-bold">Email</div>
                            <div class="">{{ $email }}</div>
                        </div>
                        <div class="form-group d-flex justify-content-between p-2">
                            <div class="fw-bold">Contact Number</div>
                            <div class="">{{ $contact_number }}</div>
                        </div>
                        <div class="form-group d-flex justify-content-between p-2">
                            <div class="fw-bold">Address</div>
                            <div class="">{{ $address }}</div>
                        </div>
                        <div class="form-group d-flex justify-content-between p-2">
                            <div class="fw-bold">Zip Code</div>
                            <div class="">{{ $zipcode }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>

   @if ($status == 0 || $status == 1)
    <div class="col-md-12 mt-3 p-1 text-center">
        <h2 class="mb-2">Current Reservations</h2>
        <table cellpadding="10">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Booked on</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($current_reservation) > 0)
                    <?php $i = 1; ?>
                    @foreach ($current_reservation as $reservation)
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
                            <td data-label="Booked on">{{ Carbon\Carbon::parse($reservation->created_at)->format('d-M-Y  g:i:s A' ) }}</td>
                            <?php
                                $id = [
                                    'id' => Crypt::encrypt($reservation->id) 
                                ]
                            ?>
                           <td data-label="Action">
                                <a href="{{ auth()->user()->role == 'tourism' ? route('reservationdetails', $id):route('adminreservationdetails', $id) }}" class="btn btn-primary mx-1 {{ $reservation->start_date == $from && $reservation->end_date == $to ? 'disabled':''}}" ><i class="bi bi-eye fs-5"></i></a>
                           </td>
                        </tr>
                    @endforeach
                @else
                <tr>
                    <td data-label="State" colspan="6" class="text-center p-2">No Ongoing Reservation.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
   @endif

   <script>
        function change(img){
            img.classList.toggle('fullsize');
        }
    </script>

 </div>
 