<section class="container-fluid" id="pending-reservation">
    <h3 class="fw-bold text-center" ><u>Pending Reservations</u></h3>
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
    <div class="row d-flex justify-content-center">
            @if (auth()->user()->role == 'tourism')
                @if (count($staff_booked_equipment) > 0 ||  count($staff_booked_facility) > 0)
                    @foreach ($staff_booked_equipment as $reservation)
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
                                    <a href="{{ route('reservationdetails', $id) }}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                                    @if ($reservation->status == 0)
                                        <button type="button" class="btn btn-success mx-1 {{ $sameDateApproved ? 'disabled':'' }}" wire:key="staffApprovalEquipment" wire:click.prevent="staffApproval({{ $reservation->id }})" wire:confirm="Do you want to approve this request?">
                                            <div wire:loading wire:target="staffApproval({{ $reservation->id }})" wire:key="staffApprovalEquipment">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            </div>
                                            <i class="bi bi-bookmark-check fs-5"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning mx-1" wire:key="rejectApprovalEquipment" wire:click.prevent="rejectApproval({{ $reservation->id }})" wire:confirm="Do you want to reject this request?"><i class="bi bi-journal-x fs-5"></i></button>
                                    @else
                                        <button type="button" class="btn btn-secondary mx-1" wire:key="staffCancelApprovalEquipment" wire:click.prevent="staffCancelApproval({{ $reservation->id }})"><i class="bi bi-x-circle"></i></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($staff_booked_facility as $reservation)
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
                                    <a href="{{ route('reservationdetails', $id) }}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                                    @if ($reservation->status == 0)
                                    
                                        <button type="button" class="btn btn-success mx-1 {{ $sameDateApproved ? 'disabled':'' }}" wire:key="staffApprovalRoom" wire:click.prevent="staffApproval({{ $reservation->id }})" wire:confirm="Do you want to approve this request?">
                                            <div wire:loading wire:target="staffApproval({{ $reservation->id }})" wire:key="staffApprovalEquipment">
                                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            </div>
                                            <i class="bi bi-bookmark-check fs-5"></i>
                                        </button>
                                        <button type="button" class="btn btn-warning mx-1" wire:key="rejectApprovalRoom" wire:click.prevent="rejectApproval({{ $reservation->id }})" wire:confirm="Do you want to reject this request?"><i class="bi bi-journal-x fs-5"></i></button>
                                    @else
                                        <button type="button" class="btn btn-secondary mx-1" wire:key="staffCancelApprovalRoom" wire:click.prevent="staffCancelApproval({{ $reservation->id }})"><i class="bi bi-x-circle"></i></button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center">No Pending Reservation.</h3>
                @endif
            @endif

            @if (auth()->user()->role == 'admin-tourism')
                @if (count($admin_booked_equipment) > 0 || count($admin_booked_facility) > 0)
                    @foreach ($admin_booked_equipment as $reservation)
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
                                    <a href="{{ route('adminreservationdetails', Crypt::encrypt($reservation->id)) }}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                                    <button type="button" class="btn btn-success mx-1 {{ $reservation->status == 0 || $sameDateApproved ? 'disabled':'' }}" wire:click.prevent="adminApproval({{ $reservation->id }})" wire:confirm="Do you want to approve this request?">
                                        <div wire:loading wire:target="adminApproval({{ $reservation->id }})" wire:key="adminApprovalEquipment">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </div>
                                        <i class="bi bi-bookmark-check fs-5"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning mx-1" wire:key="rejectApprovalEquipment" wire:click.prevent="rejectApproval({{ $reservation->id }})" wire:confirm="Do you want to reject this request?"><i class="bi bi-journal-x fs-5"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @foreach ($admin_booked_facility as $reservation)
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
                                    <a href="{{ route('adminreservationdetails', Crypt::encrypt($reservation->id)) }}" class="btn btn-primary mx-1" ><i class="bi bi-eye fs-5"></i></a>
                                    <button type="button" class="btn btn-success mx-1 {{ $reservation->status == 0 || $sameDateApproved ? 'disabled':'' }}" wire:click.prevent="adminApproval({{ $reservation->id }})" wire:confirm="Do you want to approve this request?">
                                        <div wire:loading wire:target="adminApproval({{ $reservation->id }})" wire:key="adminApprovalEquipment">
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                        </div>
                                        <i class="bi bi-bookmark-check fs-5"></i>
                                    </button>
                                    <button type="button" class="btn btn-warning mx-1" wire:key="rejectApprovalRoom" wire:click.prevent="rejectApproval({{ $reservation->id }})" wire:confirm="Do you want to reject this request?"><i class="bi bi-journal-x fs-5"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="text-center">No Pending Reservation.</h3>
                @endif
            @endif
    </div>
</section>