<section class="container-fluid" id="pending-reservation">
    <h3 class="fw-bold text-center" ><u>Pending Reservations</u></h3>
    <div class="row my-4 d-flex justify-content-end">
        <div class="col-md-3 me-2 d-flex justify-content-end align-items-center">
            <span class="me-2">Item</span>
            <select wire:model.live="item_type" class="p-1">
                <option disabled>Item Type</option>
                <option value="">All</option>
                <option value="equipment">Equipments & Others</option>
                <option value="facility">Facilities</option>
            </select>
        </div>
        <div class="col-md-3 my-1 me-2 d-flex justify-content-end align-items-center">
            <span class="me-2 ">From</span>
            <input type="datetime-local" wire:model.live="start_date" class="p-1">
        </div>
        <div class="col-md-3 my-1 d-flex justify-content-end align-items-center">
            <span class="me-2">To</span>
            <input type="datetime-local" wire:model.live="end_date" class="p-1">
        </div>
        <div class="col-md-4 my-1  d-flex justify-content-end">
            <input type="text" wire:model.live="search_data" class="p-1" placeholder="Search Reservation">
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @if (count($reservation_pending) > 0)
            @foreach ($reservation_pending as $reservation)
                <div class="col-md-5 m-1">
                    <div class="shadow">
                        <div class="p-2" style="background: #dd8c22">
                            <div class="item_name text-center fw-bold ">{{ $reservation->item_name }}</div>
                        </div>
                        <div class="img text-center mb-4 py-3">
                            <img src="{{ asset('images/tcgc-items/'.$reservation->item_img) }}" alt="" width="200" height="200">
                        </div>
                        <div class="user-info p-2">
                            <div class="text-center border-top border-bottom mb-2"> Reservation Information</div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold">Name</div>
                                <div class="">{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</div>
                            </div>
                            @if ($reservation->activity)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Activity</div>
                                    <div class="">{{ $reservation->activity }}</div>
                                </div>
                            @endif
                            @if ($reservation->chair != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Chair/s</div>
                                    <div class="">{{ $reservation->chair }}</div>
                                </div>
                            @endif
                            @if ($reservation->table != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Table/s</div>
                                    <div class="">{{ $reservation->table }}</div>
                                </div>
                            @endif
                            @if ($reservation->rostrum != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Rostrum/s</div>
                                    <div class="">{{ $reservation->rostrum }}</div>
                                </div>
                            @endif
                            @if ($reservation->speaker != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Speaker/s</div>
                                    <div class="">{{ $reservation->speaker }}</div>
                                </div>
                            @endif
                            @if ($reservation->microphone != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Microphone/s</div>
                                    <div class="">{{ $reservation->microphone }}</div>
                                </div>
                            @endif
                            @if ($reservation->projector != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Projector/s</div>
                                    <div class="">{{ $reservation->projector }}</div>
                                </div>
                            @endif
                            @if ($reservation->strobing_light != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Strobing Light/s</div>
                                    <div class="">{{ $reservation->strobing_light }}</div>
                                </div>
                            @endif
                            @if ($reservation->electricfan != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Electricfan/s</div>
                                    <div class="">{{ $reservation->electricfan }}</div>
                                </div>
                            @endif
                            @if ($reservation->volleyball_ball != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Volleyball Ball/s</div>
                                    <div class="">{{ $reservation->volleyball_ball }}</div>
                                </div>
                            @endif
                            @if ($reservation->volleyball_net != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Volleyball Net/s</div>
                                    <div class="">{{ $reservation->volleyball_net }}</div>
                                </div>
                            @endif
                            @if ($reservation->basketball_ball != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Basketball Ball/s</div>
                                    <div class="">{{ $reservation->basketball_ball }}</div>
                                </div>
                            @endif
                            @if ($reservation->javelin != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Javelin/s</div>
                                    <div class="">{{ $reservation->javelin }}</div>
                                </div>
                            @endif
                            @if ($reservation->discus_throw != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Discus Throw/s</div>
                                    <div class="">{{ $reservation->discus_throw }}</div>
                                </div>
                            @endif
                            @if ($reservation->shotput != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Shotput/s</div>
                                    <div class="">{{ $reservation->shotput }}</div>
                                </div>
                            @endif
                            @if ($reservation->soccer_ball != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Soccer Ball/s</div>
                                    <div class="">{{ $reservation->soccer_ball }}</div>
                                </div>
                            @endif
                            @if ($reservation->swim_cap != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Swim Cap/s</div>
                                    <div class="">{{ $reservation->swim_cap }}</div>
                                </div>
                            @endif
                            @if ($reservation->goggle != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Goggle/s</div>
                                    <div class="">{{ $reservation->goggle }}</div>
                                </div>
                            @endif
                            @if ($reservation->number_of_person != 0)
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="fw-bold">Number of Persons</div>
                                    <div class="">{{ $reservation->number_of_person }}</div>
                                </div>
                            @endif
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold">From</div>
                                <div class="">{{ Carbon\Carbon::parse($reservation->start_date)->format('d-M-Y  g:i:s A' ) }}</div>
                            </div>
                                <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold">To</div>
                                <div class="">{{ Carbon\Carbon::parse($reservation->end_date)->format('d-M-Y  g:i:s A' ) }}</div>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold">Booked on</div>
                                <div class="">{{ Carbon\Carbon::parse($reservation->created_at)->format('d-M-Y  g:i:s A' ) }}</div>
                            </div>
                            @php
                                $sameDateApproved = $this->hasApprovedBookingOnSameDate($reservation->start_date, $reservation->end_date, $reservation->item_id)
                            @endphp

                            @if ($reservation->status == 1)
                                <div class="form-group border-top border-bottom text-center">
                                    <span class="p-1 text-warning">Waiting for admin approval.</span>
                                </div>
                            @elseif ($sameDateApproved)
                                <div class="form-group border-top border-bottom text-center">
                                    <span class="p-1 text-danger">Reservation Conflict</span>
                                </div>
                            @else
                                <div class="form-group border-top border-bottom text-center">
                                    <span class="p-1 text-danger">Not yet approved by staff.</span>
                                </div>
                            @endif
                        </div>
                        <?php
                            $id = [
                                'id' => Crypt::encrypt($reservation->id) 
                            ]
                        ?>
                        <div class="action d-flex justify-content-end flex-row p-2">
                            @if (auth()->user()->role == 'tcgc')
                                <a href="{{route('stafftcgcreservationdetails', $id)}}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                                @if ($reservation->status == 0)
                                    <button type="button" class="btn btn-success mx-1 {{ $sameDateApproved ? 'disabled':'' }}" wire:key="staffApproval" wire:click.prevent="staffApproval({{ $reservation->id }})" wire:confirm="Do you want to approve this request?">
                                        <div wire:loading wire:target="staffApproval({{ $reservation->id }})" wire:key="staffApproval">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </div>
                                        <i class="bi bi-bookmark-check fs-5"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning mx-1" wire:key="rejectApproval" wire:click.prevent="rejectApproval({{ $reservation->id }})"  wire:confirm="Do you want to reject this request?"><i class="bi bi-journal-x fs-5"></i></button>
                                @else
                                    <button type="button" class="btn btn-secondary mx-1" wire:key="staffCancelApproval" wire:click.prevent="staffCancelApproval({{ $reservation->id }})"><i class="bi bi-x-circle"></i></button>
                                @endif
                            @else
                                <a href="{{route('admintcgcreservationdetails', $id)}}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                                <button type="button" class="btn btn-success mx-1 {{ $reservation->status == 0 || $sameDateApproved ? 'disabled':'' }}" wire:key="adminApproval" wire:click.prevent="adminApproval({{ $reservation->id }})" wire:confirm="Do you want to approve this request?">
                                    <div wire:loading wire:target="adminApproval({{ $reservation->id }})" wire:key="adminApproval">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </div>
                                    <i class="bi bi-bookmark-check fs-5"></i>
                                </button>
                                <button type="button" class="btn btn-warning mx-1" wire:key="rejectApproval" wire:click.prevent="rejectApproval({{ $reservation->id }})"  wire:confirm="Do you want to reject this request?">
                                    <div wire:loading wire:target="rejectApproval({{ $reservation->id }})" wire:key="rejectApproval">
                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    </div>
                                    <i class="bi bi-journal-x fs-5"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h3 class="text-center">No Pending Reservation.</h3>
        @endif
    </div>
</section>