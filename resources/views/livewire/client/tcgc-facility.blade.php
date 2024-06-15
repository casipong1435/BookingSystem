<div>
  
    <div class="my-5 px-4">
      <h2 class="fw-bold h-font text-center">OUR FACILITIES</h2>
        
      <div class="h-line bg-dark"></div>
        
      <div class="container shadow p-4">
        <div class="row">
  
         @if (auth()->check())
          @if (auth()->user()->usertype == 1 || auth()->user()->usertype == 2 || auth()->user()->usertype == 3)
          <div class="d-flex justify-content-between p-4">
            <div>
              <input type="text" wire:model.live="search_data" placeholder="Search Item..." class="p-1">
            </div>
            <div>
              <a wire:navigate href="{{ route('client-city-facilities') }}" class="mx-1 text-decoration-none fs-6 item-list {{ session()->get('city-facilities') == 'city-facilities' ? 'active':'' }}">City</a>
                          <a wire:navigate href="{{ route('client-tcgc-facilities') }}" class="mx-1 text-decoration-none fs-6 item-list {{ session()->get('tcgc-facilities') == 'tcgc-facilities' ? 'active':'' }}">TCGC</a>
            </div>
          </div>
          @endif
         @endif
  
          <!-- TCGC Item List -->
            <section class="row">
              <div class="col-lg-4 col-md-6 mb-5 px-4">
                <div class="shadow">
                    <div class="form-group p-2">
                        <b>Note:</b> One (1) Reservation a day per person. Please check the item availability first before making a reservation. Reservations must be made with a minimum interval of 2 hours between each booking.
                    </div>
                </div>
              </div>
              @if (count($tcgc_item) > 0)
                @foreach ($tcgc_item as $tcgc)
                @php
                  $item_id = [
                              'item_id' => Crypt::encrypt($tcgc->item_id)
                            ]
                @endphp
                  <div class="col-lg-4 col-md-6 mb-5 px-4">
                    <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
                      <div class="d-flex align-items-center mb-2">
                        <img src="images/facilities/Tangub.jpg" width="40px">
                        <h5 class="m-0 ms-3"> {{ $tcgc->item_name }}</h5>
                      </div>  
                      <p>
                          {{$tcgc->desciption}}
                      </p> 
                      
                      <div class="d-flex justify-content-between text-center">
                        <img src="images/tcgc-items/{{ $tcgc->item_img }}" height="100px" width="50%">
                        <div class="px-2">
                          <h6 class="mx-2">Status</h6>
                          <span class="badge rounded-pill bg-light text-wrap mb-2 fs-6 fw-bold {{ ($tcgc->status == 1) ? 'text-primary':'text-dark' }}">
                            @if ($tcgc->status == 1)
                              Available
                            @else
                              Not Available
                            @endif
                        </span>
                        @if (auth()->check())
                            <button type="button" class="btn btn-sm w-100 text-white shadow-none bg-dark {{ $tcgc->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#MakeTCGCReservation" wire:click="getcgcItemData({{ $tcgc->item_id }})">Select</button>
                          @else
                            <button type="button" class="btn btn-sm w-100 text-white shadow-none bg-dark" data-bs-toggle="modal" data-bs-target="#loginModel">Select</button>
                          @endif
                          <a href="{{ route('clientmoreimages', $item_id) }}" class="btn btn-sm w-100 btn-outline-dark shadow-none my-2 bg-dark text-white">More Images</a>
                        </div>
                      </div>
                      <div class="row mt-2">
                          <div class="Facilities">
                            <h6 class="mb-1">Reservations</h6>
                              <a href="{{ route('checkreservation', $item_id) }}" class="badge rounded-pill bg-light text-dark text-wrap">
                                Check Reservations
                              </a>
                          </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              @else
              <div class="row mb-3 px-3">
                <div class="col-md-12 d-flex justify-content-center px-2">
                    <h1>No Facilities Added Yet!</h1>
                </div>
              </div>
              @endif
            </section>
  
        </div>
      </div>
      @include('livewire.client.maketcgcreservation')
  </div>


 
  