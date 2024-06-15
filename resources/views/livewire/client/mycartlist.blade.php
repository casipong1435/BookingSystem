<div>
    @include('livewire.client.makereservation')

    <div class="col-md-12 px-4 py-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

    <h3 class="text-center"><i class="bi bi-cart4 me-2"></i>My Cart</h3>
    <div class="container-fluid  mt-2 p-2 shadow">
        <div class="row text-center d-flex justify-content-center">
            @if (count($mycart_equipment) > 0 || count($mycart_facility) > 0)
    
                @foreach ($mycart_equipment as $item_equipment)
                    <div class="col-lg-4 m-3">
                        <div class="shadow">
                            <div class="form-group border p-2 position-relative">
                                <span> {{ $item_equipment->item_name }}</span>
                                <button type="button" class="btn btn-danger rounded-0 position-absolute top-0 end-0" wire:key="item_equipment" wire:click.prevent="deleteCartItem('{{$item_equipment->price_id}}', '{{$item_equipment->item_type}}')" wire:confirm="Are you sure you want to delete this item?"><i class="bi bi-trash"></i></button>
                            </div>
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div>Status:</div>
                                <div class="{{ $item_equipment->status == 1 ? 'text-primary': 'text-danger' }}">
                                    @if ($item_equipment->status == 1)
                                        Available
                                    @else
                                        Not Available
                                    @endif
                                </div>
                            </div>
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div>Price:</div>
                                <div>{{ $item_equipment->price }}</div>
                            </div>
                            <div class="form-group border d-flex justify-content-between p-2">
                                <div>Quantity:</div>
                                <div>{{ $item_equipment->quantity }}</div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="w-100 btn btn-success rounded-0 {{ $item_equipment->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#MakeReservation" wire:click="getItemName('{{$item_equipment->item_id}}', '{{$item_equipment->price_id}}')">Select</button>
                            </div>
                        </div>
                    </div>
                @endforeach
    
                @foreach ($mycart_facility as $item_facility)
                    <div class="col-lg-4 m-3">
                        <div class="shadow">
                            <div class="form-group border p-2 position-relative">
                                <span> {{ $item_facility->item_name }}</span>
                                <button type="button" class="btn btn-danger rounded-0 position-absolute top-0 end-0" wire:key="item_facility" wire:click.prevent="deleteCartItem('{{$item_facility->price_id}}', '{{$item_facility->item_type}}')" wire:confirm="Are you sure you want to delete this item?"><i class="bi bi-trash"></i></button>
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
                                <div class="{{ $item_facility->status == 1 ? 'text-primary': 'text-danger' }}">
                                @if ($item_facility->status == 1)
                                    Available
                                @else
                                    Not Available
                                @endif
                                </div>
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
                                <div>Quantity:</div>
                                <div>{{ $item_facility->quantity }}</div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="w-100 btn btn-success rounded-0 {{ $item_facility->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#MakeReservation" wire:click="getItemName('{{$item_facility->item_id}}', '{{$item_facility->price_id}}')">Select</button>
                            </div>
                        </div>
                    </div>
                @endforeach
    
            @else
                <h3 class="text-center"> No Item Added.</h3>
            @endif
        </div>
    </div>
    @include('partials.booking-error')
</div>
