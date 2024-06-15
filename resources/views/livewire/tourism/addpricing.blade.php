
<div class="col-md-12">
    @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show message" id="message" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
    @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show message" id="message" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
    @endif
</div>

<!-- Equipment Pricing Modal -->
<div class="modal fade" wire:ignore.self id="equipmentaddprice" tabindex="-1" aria-labelledby="equipmentaddpriceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="equipmentaddpriceLabel">Add Pricing</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="addEquipmentPricing('{{ $item_name }}')">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="equipment-item-name">Item Name</label>
                            <input type="text" value="{{ $item_name }}" id="equipment-item-name" class="p-2 w-100" disabled>
                        </div>
                        <div class="form-group mb-2">
                            <label for="equipment-item-price">Price</label>
                            <input type="text" wire:key="equipment_item_price" wire:model="price" id="equipment-item-price" class="p-2 w-100" placeholder="Enter Here..">
                            @error('price')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success"><div wire:loading wire:target="addEquipmentPricing" wire:key="addEquipmentPricing"><i class="bi bi-arrow-repeat"></i></div>Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Room Pricing Modal -->
<div class="modal fade" wire:ignore.self id="roomaddprice" tabindex="-1" aria-labelledby="roomaddpriceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="roomaddpriceLabel">Add Pricing</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="addFacilityPricing('{{ $item_name }}')">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-2">
                            <label for="room-item-name">Item Name</label>
                            <input type="text" value="{{ $item_name }}" id="room-item-name" class="p-2 w-100" disabled>
                        </div>
                        <div class="form-group mb-2">
                            <label for="room-item-purpose">Purpose</label>
                            <input type="text" wire:key="room_item_purpose" wire:model="purpose" id="room-item-purpose" class="p-2 w-100" placeholder="Enter Here..">
                            @error('purpose')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="room-item-time">Time</label>
                            <select wire:key="room_item_time" wire:model="time" id="room-item-time" class="p-2 w-100">
                                <option selected disabled>Select Time</option>
                                <option value="Daytime">Daytime</option>
                                <option value="Night Time">Night Time</option>
                                <option value="All Time">All Time</option>
                            </select>
                            @error('time')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="room-item-aircon">With Aircon</label>
                            <select wire:key="room_item_aircon" wire:model="aircon" id="room-item-aircon" class="p-2 w-100">
                                <option selected disabled>Select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('aircon')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="room-item-price_description">Price Description</label>
                            <input type="text" wire:key="room_item_price_description" wire:model="price_description" id="room-item-price_description" class="p-2 w-100" placeholder="Enter Here..">
                            @error('price_description')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label for="room-item-price">Price</label>
                            <input type="text" wire:key="room_item_price" wire:model="price" id="room-item-price" class="p-2 w-100" placeholder="Enter Here..">
                            @error('price')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success"><div wire:loading wire:target="addFacilityPricing" wire:key="addFacilityPricing"><i class="bi bi-arrow-repeat"></i></div>Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>

