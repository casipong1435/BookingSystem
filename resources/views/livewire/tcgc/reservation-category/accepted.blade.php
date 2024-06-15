<section class="container" id="accepted-reservation">
    <h3 class="fw-bold text-center" ><u>Approved Reservations</u></h3>
    <div class="row my-4 d-flex justify-content-end">
        <div class="col-md-3 my-1 me-2 d-flex justify-content-end align-items-center">
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
        <div class="col-md-4 my-1 d-flex justify-content-end">
            <input type="text" wire:model.live="search_data" class="p-1" placeholder="Search Reservation">
        </div>
    </div>
    <div class="row p-3">
        @if (count($reservation_accepted) > 0)
            @foreach ($reservation_accepted as $reservation)
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
                    </div>
                    <?php
                        $id = [
                            'id' => Crypt::encrypt($reservation->id) 
                        ]
                    ?>
                    <div class="action d-flex justify-content-end flex-row p-2">
                        @if (auth()->user()->role == 'tcgc')
                            <a href="{{route('stafftcgcreservationdetails', $id)}}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                        @else
                            <a href="{{route('admintcgcreservationdetails', $id)}}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                            @if ($reservation->start_date > $today)
                                <button type="button" class="btn btn-secondary mx-1" wire:key="adminCancelApproval" wire:click.prevent="adminCancelApproval({{ $reservation->id }})"><i class="bi bi-x-circle"></i></button>
                            @endif
                        @endif
                        @if ($reservation->end_date < $today)
                            <button type="button" class="btn btn-success mx-1" wire:click="FinishReservation({{ $reservation->id }})" wire:confirm="Are you sure to complete this reservation?">Finish</button>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h3 class="text-center">No Approved Reservation.</h3>
        @endif
    </div>
</section>