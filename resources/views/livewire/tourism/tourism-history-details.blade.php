<div>
    <div class="col-md-12 p-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

    <div class="col-md-12 text-center">
        <h2 class=" mb-2">{{ $item_name }}</h2>
        <img src="{{ asset('images/tourism-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
   </div>

   <hr>

   @switch($item_type)
       @case('equipment')
            @include('livewire.tourism.history-table.equipment-table')
           @break

        @case('room')
            @include('livewire.tourism.history-table.room-table')
           @break

        @case('facility')
            @include('livewire.tourism.history-table.facility-table')
           @break
           
   @endswitch
</div>
