<div>
    <div class="col-md-12 p-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>
   <div class="col-md-12 text-center">
        <h2 class=" mb-2">{{ $item_name }}</h2>
        <img src="{{ asset('images/tcgc-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
   </div>

   <hr>

  <div class="col-md-12 mt-2 text-center">
       <div class="row d-flex justify-content-center">
           <div class="col-md-5 m-1">
               <div class="form-group p-1 border-bottom text-center fw-bold mb-2">
                   <span>Reservation Details</span>
               </div>
               <div class="form-group d-flex justify-content-between p-2">
                   <div class="fw-bold">Status</div>
                   @if ($status == 0)
                       <div class="bg-warning">Pending</div>
                   @elseif ($status == 1)
                       <div class="bg-warning">Pending (Needs Admin Approval)</div>
                   @elseif ($status == 2)
                       <div class="bg-success">Approved</div>
                   @elseif ($status == 3)
                       <div class="bg-success">Finished</div>
                   @else
                       <div class="bg-danger">Rejected</div>
                   @endif
               </div>
               @if ($activity != null)
                   <div class="form-group d-flex justify-content-between p-2">
                       <div class="fw-bold">Activity</div>
                       <div class="">{{ $activity }}</div>
                   </div>
               @endif
               @if ($chair != 0)
                   <div class="form-group d-flex justify-content-between p-2">
                       <div class="fw-bold">Chair/s</div>
                       <div class="">{{ ucfirst($chair) }}</div>
                   </div>
               @endif
               @if ($table != 0)
                   <div class="form-group d-flex justify-content-between p-2">
                       <div class="fw-bold">Table/s</div>
                       <div class="">{{ $table }}</div>
                   </div>
               @endif
               @if ($rostrum != 0)
                   <div class="form-group d-flex justify-content-between p-2">
                       <div class="fw-bold">Rostrum/s</div>
                       <div class="">{{ $rostrum }}</div>
                   </div>
               @endif
               @if ($speaker != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Speaker/s</div>
                        <div class="">{{ $speaker }}</div>
                    </div>
                @endif
                @if ($microphone != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Microphone/s</div>
                        <div class="">{{ $microphone }}</div>
                    </div>
                @endif
                @if ($projector != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Projector/s</div>
                        <div class="">{{ $projector }}</div>
                    </div>
                @endif
                @if ($strobing_light != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Strobing Light/s</div>
                        <div class="">{{ $strobing_light }}</div>
                    </div>
                @endif
                @if ($electricfan != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Electricfan/s</div>
                        <div class="">{{ $electricfan }}</div>
                    </div>
                @endif
                @if ($volleyball_ball != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Volleyball Ball/s</div>
                        <div class="">{{ $volleyball_ball }}</div>
                </div>
                @endif
                @if ($volleyball_net != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Volleyball Net/s</div>
                        <div class="">{{ $volleyball_net }}</div>
                    </div>
                @endif
                @if ($basketball_ball != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Basketball Ball/s</div>
                        <div class="">{{ $basketball_ball }}</div>
                    </div>
                @endif
                @if ($javelin != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Javelin/s</div>
                        <div class="">{{ $javelin }}</div>
                    </div>
                @endif
                @if ($discus_throw != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Discus Throw/s</div>
                        <div class="">{{ $discus_throw }}</div>
                    </div>
                @endif
                @if ($shotput != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Shotput/s</div>
                        <div class="">{{ $shotput }}</div>
                    </div>
                @endif
                @if ($soccer_ball != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Soccer Ball/s</div>
                        <div class="">{{ $soccer_ball }}</div>
                    </div>
                @endif
                @if ($swim_cap != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Swim Cap/s</div>
                        <div class="">{{ $swim_cap }}</div>
                    </div>
                @endif
                @if ($goggle != 0)
                    <div class="d-flex justify-content-between mb-2">
                        <div class="fw-bold">Goggle/s</div>
                        <div class="">{{ $goggle }}</div>
                    </div>
                @endif
               @if ($number_of_person != 0)
                   <div class="form-group d-flex justify-content-between p-2">
                       <div class="fw-bold">Number of Person</div>
                       <div class="">{{ $number_of_person }}</div>
                   </div>
               @endif
               <div class="form-group d-flex justify-content-between p-2">
                   <div class="fw-bold">From</div>
                   <div class="">{{ Carbon\Carbon::parse($start_date)->format('d-M-Y  g:i:s A' ) }}</div>
               </div>
               <div class="form-group d-flex justify-content-between p-2">
                   <div class="fw-bold">To</div>
                   <div class="">{{ Carbon\Carbon::parse($end_date)->format('d-M-Y  g:i:s A' ) }}</div>
               </div>
           </div>
           <div class="col-md-5">
                <div class="form-group p-1 border-bottom text-center fw-bold mb-2">
                    <span>Reservee</span>
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
                        <div class="fw-bold">Institute</div>
                        <div class="">{{ $institute }}</div>
                    </div>
                    <div class="form-group d-flex justify-content-between p-2">
                        <div class="fw-bold">Date of Birth</div>
                        <div class="">{{ $date_of_birth }}</div>
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
                   <th>Booked by</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               @if (count($current_reservation) > 0)
                   <?php $i = 1; ?>
                   @foreach ($current_reservation as $reservation)
                       <tr class="{{ $reservation->start_date == $start_date && $reservation->end_date == $end_date ? 'bg-secondary bg-gradient':'' }}">
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
                           <td data-label="Booked by">{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</td>
                           <?php
                                $id = [
                                    'id' => Crypt::encrypt($reservation->id) 
                                ]
                            ?>
                           <td data-label="Action">
                                @if (auth()->user()->role == 'tcgc')
                                    <a href="{{route('stafftcgcreservationdetails', $id)}}" class="btn btn-primary mx-1 {{ $reservation->start_date == $start_date && $reservation->end_date == $end_date ? 'disabled':''}}" ><i class="bi bi-eye fs-5"></i></a>
                                @else
                                    <a href="{{route('admintcgcreservationdetails', $id)}}" class="btn btn-primary mx-1 {{ $reservation->start_date == $start_date && $reservation->end_date == $end_date ? 'disabled':''}}" ><i class="bi bi-eye fs-5"></i></a>
                                @endif
                           </td>
                       </tr>
                   @endforeach
               @else
               <tr>
                   <td data-label="State" colspan="9" class="text-center p-2">No Ongoing Reservation.</td>
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
