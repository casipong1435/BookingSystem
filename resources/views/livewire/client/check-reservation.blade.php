<div>
    <div class="col-md-12 px-4 py-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

    <div class="col-md-12 text-center">
        <h2 class=" mb-2">{{ $item_name }}</h2>
        @if ($in_charge == 'city')
            <img src="{{ asset('images/tourism-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
        @else
            <img src="{{ asset('images/tcgc-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
        @endif
   </div>

   <hr>
    
    <div class="col-md-12 mt-1 px-4 text-center">
        <h2 class="mb-2">Current Reservations</h2>

        <div class="col-md-12 m-3 d-flex justify-content-end">
            <div class="col-md-3 d-flex align-items-center">
                <span class="me-2 ">From</span>
                <input type="datetime-local" wire:model.live="start_date" class="p-1">
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <span class="me-2">To</span>
                <input type="datetime-local" wire:model.live="end_date" class="p-1">
            </div>
        </div>

        <table cellpadding="10">
            @if ($in_charge == 'city')
                @include('livewire.client.current-reservation-category.tourism-reservation')
            @else
                @include('livewire.client.current-reservation-category.tcgc-reservation')
            @endif
        </table>
    </div>
</div>
