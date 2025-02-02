@if ($state == 0)
    <div class="row text-center d-flex justify-content-center" id="pending-reservation">
        @if (count($pending_booked_equipment) > 0 || count($pending_booked_facility) > 0 || count($pending_booked_tcgc) > 0)

            @if (count($pending_booked_equipment) > 0 || count($pending_booked_facility) > 0)
                <h1 class="text-center">CITY</h1>
                @foreach ($pending_booked_equipment as $item_equipment)
                <div class="col-lg-4 m-3">
                    <div class="shadow">
                        <div class="form-group border p-2 position-relative">
                            <span> {{ $item_equipment->item_name }}</span>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>Status:</div>
                            <div class="text-white bg-warning">Pending</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>Quantity:</div>
                            <div>{{ $item_equipment->quantity }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>From:</div>
                            <div>{{ $item_equipment->start_date }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>To:</div>
                            <div>{{ $item_equipment->end_date }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2 text-muted">
                            <div>Booked on:</div>
                            <div>{{ $item_equipment->created_at }}</div>
                        </div>
                        @if ($item_equipment->status == 1)
                            <div class="form-group border-top border-bottom text-center">
                                <span class="p-1"><strong>Note:</strong> Download the the reservation details and present it in Tangub City, Tourism Office, and process your payment for the admin to approve.</span>
                            </div>
                        @endif
                        <div class="form-group text-center">
                            @if ($item_equipment->end_date > $today)
                                @if ($item_equipment->status == 1)
                                    <a href="{{ route('download', ['id' => $item_equipment->id, 'item_type' => $item_equipment->item_type]) }}" target="_blank" class="w-100 btn btn-primary rounded-0 mb-2">Download</a>
                                @endif

                                <button type="button" class="w-100 btn btn-danger rounded-0 mb-2" wire:key="cancel" wire:click.prevent="cancelReservation({{$item_equipment->id}})" wire:confirm="Are you sure you want to cancel your reservation request?">Cancel Reservation</button>
                            @else
                                <button type="button" class="w-100 btn btn-danger rounded-0 mb-2" wire:key="remove" wire:click.prevent="cancelReservation({{$item_equipment->id}})">Remove</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($pending_booked_facility as $item_facility)
                <div class="col-lg-4 m-3">
                    <div class="shadow">
                        <div class="form-group border p-2 position-relative">
                            <span> {{ $item_facility->item_name }}</span>
                        </div>
                        @if ($item_facility->purpose)
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div class="me-2">Purpose:</div>
                            <div>{{ $item_facility->purpose }}</div>
                        </div>
                        @endif
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>Time:</div>
                            <div>{{ $item_facility->time }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>Status:</div>
                            <div class="text-white bg-warning">Pending</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>w/Aircon:</div>
                            <div>{{ $item_facility->aircon }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div class="me-2">Description:</div>
                            <div>{{ $item_facility->price_description }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>Price:</div>
                            <div>{{ $item_facility->price }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>From:</div>
                            <div>{{ $item_facility->start_date }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>To:</div>
                            <div>{{ $item_facility->end_date }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2 text-muted">
                            <div>Booked on:</div>
                            <div>{{ $item_facility->created_at }}</div>
                        </div>
                        @if ($item_facility->status == 1)
                            <div class="form-group border-top border-bottom text-center">
                                <span class="p-1"><strong>Note:</strong> Download the the reservation details and present it in Tangub City, Tourism Office, and process your payment for the admin to approve.</span>
                            </div>
                        @endif
                        <div class="form-group">
                            @if ($item_facility->end_date > $today)
                                @if ($item_facility->status == 1)
                                    <a href="{{ route('download', ['id' => $item_facility->id, 'item_type' => $item_facility->item_type]) }}" target="_blank" class="w-100 btn btn-primary rounded-0 mb-2">Download</a>
                                @endif
                                <button type="button" class="w-100 btn btn-danger rounded-0 mb-2" wire:key="cancel" wire:click.prevent="cancelReservation({{$item_facility->id}})" wire:confirm="Are you sure you want to cancel your reservation request?">Cancel Reservation</button>
                            @else
                                <button type="button" class="w-100 btn btn-danger rounded-0 mb-2" wire:key="remove" wire:click.prevent="cancelReservation({{$item_facility->id}})">Remove</button>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
            @endif

            @if (count($pending_booked_tcgc) > 0)
                <br>
                <br>
                <h1 class="text-center">TCGC</h1>
                @foreach ($pending_booked_tcgc as $item_tcgc)
                <div class="col-lg-4 m-3">
                    <div class="shadow">
                        <div class="form-group border p-2 position-relative">
                            <span> {{ $item_tcgc->item_name }}</span>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div class="me-2">Activity:</div>
                            <div>{{ $item_tcgc->activity }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>Status:</div>
                            <div class="text-white bg-warning">Pending</div>
                        </div>
                        @if ($item_tcgc->chair != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Chair Qantity:</div>
                                <div>{{ $item_tcgc->chair }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->table != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Table Qantity:</div>
                                <div>{{ $item_tcgc->table }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->rostrum != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Rostrum Qantity:</div>
                                <div>{{ $item_tcgc->rostrum }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->speaker != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Speaker Qantity:</div>
                                <div>{{ $item_tcgc->speaker }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->microphone != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Microphone Qantity:</div>
                                <div>{{ $item_tcgc->microphone }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->projector != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Projector Qantity:</div>
                                <div>{{ $item_tcgc->projector }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->strobing_light != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Strobing Light Qantity:</div>
                                <div>{{ $item_tcgc->strobing_light }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->electricfan != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Electricfan Qantity:</div>
                                <div>{{ $item_tcgc->electricfan }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->volleyball_ball != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Volleyball Ball Qantity:</div>
                                <div>{{ $item_tcgc->volleyball_ball }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->volleyball_net != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Volleyball Net Qantity:</div>
                                <div>{{ $item_tcgc->volleyball_net }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->basketball_ball != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Basketball Ball Qantity:</div>
                                <div>{{ $item_tcgc->basketball_ball }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->javelin != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Javelin Qantity:</div>
                                <div>{{ $item_tcgc->javelin }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->discus_throw != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Discus Throw Qantity:</div>
                                <div>{{ $item_tcgc->discus_throw }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->shotput != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Shotput Qantity:</div>
                                <div>{{ $item_tcgc->shotput }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->soccer_ball != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Soccer Ball Qantity:</div>
                                <div>{{ $item_tcgc->soccer_ball }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->swim_cap != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Swim Cap Qantity:</div>
                                <div>{{ $item_tcgc->swim_cap }}</div>
                            </div>
                        @endif
                        @if ($item_tcgc->goggle != 0)
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div class="me-2">Goggle Qantity:</div>
                                <div>{{ $item_tcgc->goggle }}</div>
                            </div>
                        @endif
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div class="me-2">No. of Person/s:</div>
                            <div>{{ $item_tcgc->number_of_person }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>From:</div>
                            <div>{{ $item_tcgc->start_date }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2">
                            <div>To:</div>
                            <div>{{ $item_tcgc->end_date }}</div>
                        </div>
                        <div class="form-group border d-flex justify-content-between p-2 text-muted">
                            <div>Booked on:</div>
                            <div>{{ $today }}</div>
                        </div>

                        <div class="form-group">
                            @if ($item_tcgc->end_date > $today)
                                <button type="button" class="w-100 btn btn-danger rounded-0 mb-2" wire:key="cancel" wire:click.prevent="cancelTCGCReservation({{$item_tcgc->id}})" wire:confirm="Are you sure you want to cancel your reservation request?">Cancel Reservation</button>
                            @else
                                <button type="button" class="w-100 btn btn-danger rounded-0 mb-2" wire:key="remove" wire:click.prevent="cancelTCGCReservation({{$item_tcgc->id}})">Remove</button>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
        @else
            <h3 class="text-center"> No Pending Reservation.</h3>
        @endif
    </div>
@endif