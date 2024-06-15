<div class="row">
  
  @include('partials.additem')

    <div class="col-md-12 col-md-12 px-4">

        @foreach ($room_data as $room)
        <?php
          $item_id = [
            'item_id' => Crypt::encrypt($room->item_id)
          ]
        ?>
        <div class="card mb-4 border-0 shadow {{ ($room->status == 2) ? 'archived-bg':'' }}">
            <div class="row g-0 p-3 align-items-center">
              <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                <img src="images/tcgc-items/{{ $room->item_img }}" class="img-fluid rounded">
              </div>
              <div class="col-md-5 px-lg-3 px-md-3 px-0">
                <h5 class="mb-3">{{ $room->item_name }}</h5>
                <div class="features mb-4">
                  <h6 class="mb-1">Status</h6>
                    <div class="d-flex flex-row">
                      <span class="badge rounded-pill bg-light text-wrap fs-6 fw-bold {{ ($room->status == 1) ? 'text-primary':'text-dark' }}">
                        @if ($room->status == 1)
                          Available
                        @elseif ($room->status == 0)
                          Not Available
                        @else
                          Archived
                        @endif
                      </span>
                      <div class="form-check form-switch">
                        @if ($room->status != 2)
                         <a onclick="setStatus({{ $room->id }})"><input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $room->status == 1 ? 'checked':'' }}></a>
                        @endif
                        <button type="button" class="d-none" wire:key="{{ $room->id }}" id="setItemStatus_btn{{ $room->id }}" wire:click.prevent="setItemStatus({{ $room->item_id }})"></button>
                      </div>
                    </div>
                    <div class="mt-2 p-2">
                      <a href="{{ auth()->user()->role == 'tcgc' ? route('tcgcimages', $item_id): route('admintcgcimages', $item_id) }}" target="_blank" class="btn btn-sm btn-outline-dark shadow-none mb-2">Images</a>
                    </div>
                  </div>
              </div>
              <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                <button type="button" class="btn btn-sm w-100 btn-outline-primary shadow-none mb-2" wire:key="editRoomItem" wire:click="getItemID({{ $room->item_id }})" data-bs-toggle="modal" data-bs-target="#TourismEditItem">Edit</button>
                @if ($room->status != 2)
                  <button type="button" class="btn btn-sm w-100 btn-outline-secondary shadow-none mb-2" wire:key="archive" wire:click="archiveItem('{{ $room->item_id }}')" wire:confirm="Are you sure you want to archive this room?">Archive</button>
                @else
                  <button type="button" class="btn btn-sm w-100 btn-outline-secondary shadow-none mb-2" wire:key="unarchive" wire:click="unarchiveItem('{{ $room->item_id }}')">Unarchive</button>
                @endif
                <button type="button" class="btn btn-sm w-100 btn-outline-danger shadow-none" wire:click="deleteItem({{ $room->item_id }}, '{{ $room->item_img }}')" wire:confirm="Are you sure you want to delete this equipment?">Delete</button>
              </div>
            </div>
          </div>
        @endforeach

    </div>
    <!-- View Room Data Modal -->
    @foreach ($room_data as $room)
    <div class="modal fade" id="view_room_data{{ $room->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{ $room->item_name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary"><i class="bi bi-pencil-square"></i></button>
            <button type="button" class="btn btn-success d-none">Save</i></button>
            </div>
        </div>
        </div>
    </div>
    @endforeach

</div>
