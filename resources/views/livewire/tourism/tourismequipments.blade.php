<div class="row">

  @include('partials.additem')
  
    <div class="col-md-12 p-2">
  
        @if (count($equipment_data) > 0)
            <div class="row px-3 mb-3">
                <div class="col-md-12 px-3">
                    @foreach ($equipment_data as $tourism)
                    <?php
                      $item_id = [
                      'item_id' => Crypt::encrypt($tourism->item_id)
                      ]
                    ?>
                        <div class="card mb-4 border-0 shadow {{ ($tourism->status == 2) ? 'archived-bg':'' }}">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="images/tourism-items/{{ $tourism->item_img }}" class="img-fluid rounded">
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class="mb-3">{{ $tourism->item_name }}</h5>
                                    <div class="features mb-4">
                                        <h6 class="mb-1">Status</h6>
                                        <div class="d-flex flex-row">
                                          <span class="badge rounded-pill bg-light text-wrap fs-6 fw-bold {{ ($tourism->status == 1) ? 'text-primary':'text-dark' }}">
                                            @if ($tourism->status == 1)
                                              Available
                                            @elseif ($tourism->status == 0)
                                              Not Available
                                            @else
                                              Archived
                                            @endif
                                          </span>
                                          <div class="form-check form-switch">
                                            @if ($tourism->status != 2)
                                              <a onclick="setStatus({{ $tourism->id }})"><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $tourism->status == 1 ? 'checked':'' }}></a>
                                            @endif
                                            <button type="button" class="d-none" wire:key="{{ $tourism->id }}" id="setItemStatus_btn{{ $tourism->id }}" wire:click.prevent="setItemStatus({{ $tourism->item_id }})"></button>
                                          </div>
                                        </div>
                                        @if ($tourism->description != null)
                                          <h6 class="mb-1">description</h6>
                                          <span class="badge rounded-pill bg-light text-dark text-wrap fw-bold">
                                              {{ $tourism->description }}
                                          </span>
                                        @endif
                                        <h6 class="mb-1">Quantity</h6>
                                        <span class="badge rounded-pill bg-light text-dark text-wrap fw-bold">
                                            {{ $tourism->quantity }}
                                        </span>
                                    </div>
                                    <div class="mt-2 p-2">
                                      <a href="{{ auth()->user()->role == 'tourism' ? route('tourismimages', $item_id): route('admintourismimages', $item_id) }}" target="_blank" class="btn btn-sm btn-outline-dark shadow-none mb-2">Images</a>
                                    </div>
                                </div>
                                
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                  <a href="{{ auth()->user()->role == 'tourism' ? route('itempricing', $item_id): route('adminitempricing', $item_id)}}" class="btn btn-sm w-100 btn-outline-dark shadow-none mb-2">Pricing</a>
                                  <button type="button" class="btn btn-sm w-100 btn-outline-primary shadow-none mb-2" wire:key="editEquipmentItem" wire:click="getItemID({{ $tourism->item_id }})" data-bs-toggle="modal" data-bs-target="#TourismEditItem">Edit</button>
                                  @if ($tourism->status != 2)
                                    <button type="button" class="btn btn-sm w-100 btn-outline-secondary shadow-none mb-2" wire:key="archive" wire:click="archiveItem('{{ $tourism->item_id }}')" wire:confirm="Are you sure you want to archive this room?">Archive</button>
                                  @else
                                    <button type="button" class="btn btn-sm w-100 btn-outline-secondary shadow-none mb-2" wire:key="unarchive" wire:click="unarchiveItem('{{ $tourism->item_id }}')">Unarchive</button>
                                  @endif
                                  <button type="button" class="btn btn-sm w-100 btn-outline-danger shadow-none" wire:click="deleteItem({{ $tourism->item_id }}, '{{ $tourism->item_img }}')" wire:confirm="Are you sure you want to delete this equipment?">Delete</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
  
                </div>
            </div>
        @else
            <div class="row mb-3 px-3">
                <div class="col-md-12 d-flex justify-content-center shadow px-2">
                    <h1>No Tourism Equipment</h1>
                </div>
            </div>
        @endif
  
    </div>
</div>
