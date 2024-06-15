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
<div class="col-md-12 mb-3 d-flex justify-content-between">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#TourismAddItem" wire:click="resetNamewhenAdd">+</button>
    <input type="text" wire:model.live="search_data" placeholder="Search Item...">
</div>

<!--Adding Items-->
<div class="modal fade" wire:ignore.self id="TourismAddItem" tabindex="-1" aria-labelledby="TourismAddItemLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TourismAddItemLabel">Add Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="addItem">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="item-name">Item Name</label>
                            <input type="text" wire:model="item_name" id="item-name" class="p-2 w-100" placeholder="Enter Here..">
                            @error('item_name')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="item-description">Description</label>
                            <textarea wire:model="item_description" id="item-description" class="w-100" cols="30" rows="10"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item-quantity">Quantity</label>
                                    <input type="number" wire:key="item_quantity" wire:model="item_quantity" min="1" value="1" id="item-quantity" class="p-2 w-100">
                                    @error('item_quantity')
                                        <div class="text-danger message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" wire:model="image" id="image" class="p-2 w-100">
                                    @error('image')
                                        <div class="text-danger message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-center p-3">
                                <div wire:loading wire:target="image" wire:key="image"><i class="bi bi-arrow-repeat"></i> Uploading</div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="{{ $image }}" class="image-fluid" height="300" width="300">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">
                <div wire:loading wire:target="addItem" wire:key="addItem">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Adding...</span>
                </div>
                Add
            </button>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!--Editing Items-->
<div class="modal fade" wire:ignore.self id="TourismEditItem" tabindex="-1" aria-labelledby="TourismEditItemLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="TourismEditItemLabel">Edit Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="editItem">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="item-name">Item Name</label>
                            <input type="text" wire:model="item_name" id="item-name" class="p-2 w-100" placeholder="Enter Here..">
                            @error('item_name')
                                <div class="text-danger message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="item-description">Description</label>
                            <input type="text" wire:model="item_description" id="item-description" class="p-2 w-100" placeholder="Enter Here..">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="item-quantity">Quantity</label>
                                    <input type="number" wire:model="item_quantity" min="1" id="item-quantity" class="p-2 w-100">
                                    @error('item_quantity')
                                        <div class="text-danger message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <input type="file" wire:model="image" id="image" class="p-2 w-100" placeholder="Chnage Image">
                                    @error('image')
                                        <div class="text-danger message">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 text-center p-3">
                                <div wire:loading wire:target="image" wire:key="image">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="{{ $image }}" class="image-fluid" height="300" width="300">
                                @else
                                    <input type="hidden" wire:model="data_image">
                                    <img src="{{ asset('images/'.$data_image) }}" alt="{{ $image }}" class="image-fluid" height="300" width="300">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary close-modal" wire:click="closeModal()" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">
                <div wire:loading wire:target="editItem" wire:key="editItem">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    <span class="visually-hidden">Saving...</span>
                </div>
                    Save
                </button>
            </div>
        </form>
      </div>
    </div>
  </div>
<script>

   window.addEventListener('hide:add-modal', function(){
        $('#TourismAddItem .close-modal').click();
        $('#TourismEditItem .close-modal').click();
    });
    
    function setStatus(id){
        $('#setItemStatus_btn'+id).click();
    }
</script>