<div class="row">

    @include('livewire.tourism.addpricing')
    
    <div class="col-md-12">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>
   <div class="col-md-12 text-center">
        <h2 class=" mb-2">{{ $item_name }}</h2>
        <img src="{{ asset('images/tourism-items/'.$item_img) }}" class="img-fluid" alt="" width="600" height="600">
   </div>
   @switch($item_type)
       @case('equipment')
            <div class="col-md-12 py-4">
                <h3>Pricelist <button type="button" class="btn btn-success rounded-0" data-bs-toggle="modal" data-bs-target="#equipmentaddprice">+</button></h3>
                <table cellpadding="10">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item ID</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $j = 1; ?>
                        @if (count($item_data) > 0)
                            @foreach ($item_data as $item)
                                <tr>
                                    <td data-label="No.">{{ $i++ }}</td>
                                    <td data-label="Item ID">{{ $item->item_id }}</td>
                                    <td data-label="Price">{{ $item->price }}</td>
                                    <td data-label="Action">
                                        <button type="button" class="btn btn-primary rounded-0 me-2" data-bs-toggle="modal" data-bs-target="#equipmenteditprice{{ $item->id }}" wire:click="getEquipmentData({{ $item->id }})"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger rounded-0" wire:click.prevent="deleteEquipmentPricing({{ $item->id }})" wire:confirm="Are you sure you want to delete this price?"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" wire:ignore.self id="equipmenteditprice{{$item->id}}" tabindex="-1" aria-labelledby="equipmenteditprice{{$item->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="equipmenteditprice{{$item->id}}Label">Edit Price</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form wire:submit.prevent="editEquipmentPricing({{$item->id}})">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4>Price No. {{ $j++ }}</h4>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="item_current_price">Price</label>
                                                            <input wire:model="item_current_price" id="item_current_price" class="w-100 p-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
                                              <button type="submit" class="btn btn-primary"><div wire:loading wire:target="editEquipmentPricing" wire:key="editEquipmentPricing"><i class="bi bi-arrow-repeat"></i></div>Save</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center p-2">No Price Added</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
           @break
    @case('facility')
            <div class="col-md-12 py-4">
                <h3>Pricelist <button type="button" class="btn btn-success rounded-0" data-bs-toggle="modal" data-bs-target="#roomaddprice">+</button></h3>
                <table cellpadding="10">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item ID</th>
                            <th>Purpose</th>
                            <th>Time</th>
                            <th>w/Aircon</th>
                            <th>Price Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php $j = 1; ?>
                        @if (count($item_data) > 0)
                            @foreach ($item_data as $item)
                                <tr>
                                    <td data-label="No.">{{ $i++ }}</td>
                                    <td data-label="Item ID">{{ $item->item_id }}</td>
                                    <td data-label="Purpose">{{ $item->purpose }}</td>
                                    <td data-label="Time">{{ $item->time }}</td>
                                    <td data-label="w/Aircon">{{ $item->aircon }}</td>
                                    <td data-label="Price Description">{{ $item->price_description }}</td>
                                    <td data-label="Price">{{ $item->price }}</td>
                                    <td data-label="Action" class="d-flex flex-row">
                                        <button type="button" class="btn btn-primary rounded-0 me-2" data-bs-toggle="modal" data-bs-target="#roomeditprice{{ $item->id }}" wire:click="getRoomData({{ $item->id }})"><i class="bi bi-pencil-square"></i></button>
                                        <button type="button" class="btn btn-danger rounded-0" wire:click.prevent="deleteFacilityPricing({{ $item->id }})" wire:confirm="Are you sure you want to delete this price?"><i class="bi bi-trash"></i></button>
                                    </td>
                                </tr>

                                <div class="modal fade" wire:ignore.self id="roomeditprice{{$item->id}}" tabindex="-1" aria-labelledby="roomeditprice{{$item->id}}Label" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="roomeditprice{{$item->id}}Label">Edit Price</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form wire:submit.prevent="editFacilityPricing({{$item->id}})">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group mb-2">
                                                            <h4>Price No. {{ $j++ }}</h4>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="item_current_purpose">Purpose</label>
                                                            <input wire:model="item_current_purpose" id="item_current_purpose" class="w-100 p-2">
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="item_current_time">Time</label>
                                                            <br>
                                                            <select id="item_current_time" wire:model="item_current_time" class="p-2 w-100">
                                                                <option selected disabled>Select Time</option>
                                                                <option value="Daytime">Daytime</option>
                                                                <option value="Night Time">Night Time</option>
                                                                <option value="All Time">All Time</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="item_current_price_description">Price Description</label>
                                                            <input wire:model="item_current_price_description" id="item_current_price_description" class="w-100 p-2">
                                                        </div>
                                                        <div class="form-group mb-2">
                                                            <label for="item_current_price">Price</label>
                                                            <input wire:model="item_current_price" id="item_current_price" class="w-100 p-2">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
                                              <button type="submit" class="btn btn-primary"><div wire:loading wire:target="editFacilityPricing({{$item->id}})" wire:key="editRoomPricing"><i class="bi bi-arrow-repeat"></i></div>Save</button>
                                            </div>
                                        </form>
                                      </div>
                                    </div>
                                  </div>

                            @endforeach
                        @else
                            <tr>
                                <td colspan="8" class="text-center p-2">No Price Added</td>
                            </tr>
                        @endif
                    </tbody>    
                </table>
            </div>
           @break
           
   @endswitch

   <script> 
        window.addEventListener('hide:addpricing-modal', function(){
            $('#equipmentaddprice .close-modal').click();
            $('#roomaddprice .close-modal').click();
        });

        window.addEventListener('hide:editpricing-modal', function(event){
            $('#equipmenteditprice' + event.detail.id + ' .close-modal').click();
            $('#roomeditprice' + event.detail.id + ' .close-modal').click();
        });

   </script>

</div>
