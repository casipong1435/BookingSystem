<section class="container" id="rejected-reservation">
    @if (count($user_rejected_equipment) > 0 || count($user_rejected_facility) > 0 )
    <div class="p-2">
        <button class="btn btn-danger" wire:key="deleteRejectApprovalAll" wire:click.prvent="deleteRejectApprovalAll()" wire:confirm="This will delete all the rejected request. Do you wish to continue?">Delete All</button>
    </div>
    @endif
    <h3 class="fw-bold text-center" ><u>Rejected Reservations</u></h3>
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
        @if (count($user_rejected_equipment) > 0 || count($user_rejected_facility) > 0 )
            @foreach ($user_rejected_equipment as $reservation)
            <div class="col-md-5 m-1">
                <div class="shadow">
                    <div class="p-2" style="background: #dd8c22">
                        <div class="item_name text-center fw-bold ">{{ $reservation->item_name }}</div>
                    </div>
                    <div class="img text-center mb-4 py-3">
                        <img src="{{ asset('images/tourism-items/'.$reservation->item_img) }}" alt="" width="200" height="200">
                    </div>
                    <div class="user-info p-2">
                        <div class="text-center border-top border-bottom mb-2">Reservation Information</div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Name</div>
                            <div class="">{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Address</div>
                            <div class="">{{ $reservation->address }}</div>
                        </div>
                        @if ($reservation->purpose)
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold">Purpose</div>
                                <div class="">{{ $reservation->purpose }}</div>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Quantity</div>
                            <div class="">{{ $reservation->quantity }}</div>
                        </div>
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
                        @if ($reservation->status == 1)
                            <div class="form-group border-top border-bottom text-center">
                                <span class="p-1 text-warning">Waiting for admin approval.</span>
                            </div>
                        @endif
                    </div>
                    <?php
                        $id = [
                           'id' => Crypt::encrypt($reservation->id) 
                        ]
                    ?>
                    <div class="action d-flex justify-content-end flex-row p-2">
                        <a href="{{ auth()->user()->role == 'tourism' ? route('reservationdetails', $id):route('adminreservationdetails', $id) }}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                        @if ($reservation->start_date > $today)
                            <button type="button" class="btn btn-secondary mx-1" wire:key="CancelRejectionEquipment" wire:click.prevent="cancelRejectApproval({{ $reservation->id }})"  wire:confirm="Are you sure you want to cancel request rejection?"><i class="bi bi-x-circle"></i></button>
                        @endif
                        <button type="button" class="text-white btn btn-danger mx-1" wire:key="DeleteItemEquipment" wire:click.prevent="deleteRejectApproval({{ $reservation->id }})"  wire:confirm="This request will not be recovered after deleting. Do you wish to continue?"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
            @endforeach

            @foreach ($user_rejected_facility as $reservation)
            <div class="col-md-5 m-1">
                <div class="shadow">
                    <div class="p-2" style="background: #dd8c22">
                        <div class="item_name text-center fw-bold ">{{ $reservation->item_name }}</div>
                    </div>
                    <div class="img text-center mb-4 py-3">
                        <img src="{{ asset('images/tourism-items/'.$reservation->item_img) }}" alt="" width="200" height="200">
                    </div>
                    <div class="user-info p-2">
                        <div class="text-center border-top border-bottom mb-2">Reservation Information</div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Name</div>
                            <div class="">{{ ucfirst($reservation->first_name).' '.ucfirst($reservation->last_name) }}</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Address</div>
                            <div class="">{{ $reservation->address }}</div>
                        </div>
                        @if ($reservation->purpose)
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold">Purpose</div>
                                <div class="">{{ $reservation->purpose }}</div>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Quantity</div>
                            <div class="">{{ $reservation->quantity }}</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">From</div>
                            <div class="">{{ $reservation->start_date }}3</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">To</div>
                            <div class="">{{ $reservation->end_date }}</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <div class="fw-bold">Booked on</div>
                            <div class="">{{ $reservation->created_at }}</div>
                        </div>
                        @if ($reservation->status == 1)
                            <div class="form-group border-top border-bottom text-center">
                                <span class="p-1 text-warning">Waiting for admin approval.</span>
                            </div>
                        @endif
                    </div>
                    <?php
                        $id = [
                           'id' => Crypt::encrypt($reservation->id) 
                        ]
                    ?>
                    <div class="action d-flex justify-content-end flex-row p-2">
                        <a href="{{ auth()->user()->role == 'tourism' ? route('reservationdetails', $id):route('adminreservationdetails', $id) }}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                        @if ($reservation->start_date > $today)
                            <button type="button" class="btn btn-secondary mx-1" wire:key="CancelRejectionRoom" wire:click.prevent="cancelRejectApproval({{ $reservation->id }})"  wire:confirm="Are you sure you want to cancel request rejection?"><i class="bi bi-x-circle"></i></button>
                        @endif
                        <button type="button" class="text-white btn btn-danger mx-1" wire:key="DeleteItemRoom" wire:click.prevent="deleteRejectApproval({{ $reservation->id }})"  wire:confirm="This request will not be recovered after deleting. Do you wish to continue?"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <h3 class="text-center">No Rejected Reservation.</h3>
        @endif
    </div>
</section>