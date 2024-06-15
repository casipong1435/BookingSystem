<div>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">OUR EQUIPMENTS</h2>
        <div class="h-line bg-dark"></div>
    </div>
    
    <div class="container">
      <div class="row">
        
        <div class="col-md-12 px-4 py-2 shadow">
  
          @if (auth()->check())
            @if (auth()->user()->usertype == 1 || auth()->user()->usertype == 2 || auth()->user()->usertype == 3)
            <div class="d-flex justify-content-between p-2">
              <div>
                <input type="text" wire:model.live="search_data" placeholder="Search Item..." class="p-1">
              </div>
              <div>
                <a wire:navigate href="{{ route('client-city-equipment') }}" class="mx-1 text-decoration-none fs-6 item-list {{ session()->get('city-equipment') == 'city-equipment' ? 'active':'' }}">City</a>
                <a wire:navigate href="{{ route('client-tcgc-equipment') }}" class="mx-1 text-decoration-none fs-6 item-list {{ session()->get('tcgc-equipment') == 'tcgc-equipment' ? 'active':'' }}">TCGC</a>
              </div>
            </div>
            @endif
          @endif
  
          <!-- City Item List -->
            <section>
              @if (count($item_data) > 0)
                @foreach ($item_data as $item)
                  <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                      <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                        <img src="images/tourism-items/{{ $item->item_img }}" class="img-fluid rounded">
                      </div>
                      <div class="col-md-5 px-lg-3 px-md-3 px-0">
                        <h5 class="mb-3">{{ $item->item_name }}</h5>
                        <div class="features mb-4">
                          <h6 class="mb-1">Status</h6>
                            <span class="badge rounded-pill bg-light text-wrap fs-6 fw-bold {{ ($item->status == 1) ? 'text-primary':'text-dark' }}">
                              @if ($item->status == 1)
                                Available
                              @else
                                Not Available
                              @endif
                            </span>
                        </div>
                        @if ($item->description)
                          <div class="Facilities mb-3">
                            <h6 class="mb-1">Description</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap">
                              {{ $item->description }}
                            </span>
                          </div>
                        @endif
  
                        <div class="Facilities mb-3">
                          <h6 class="mb-1">Quantity</h6>
                          <span class="badge rounded-pill bg-light text-dark text-wrap">
                            {{ $item->quantity }}
                          </span>
                        </div>
  
                        <?php
                            $item_id = [
                              'item_id' => Crypt::encrypt($item->item_id)
                            ]
                          ?>
                          <div class="Facilities mb-3">
                            <h6 class="mb-1">Reservations</h6>
                              <a href="{{ route('checkreservation', $item_id) }}" class="badge rounded-pill bg-light text-dark text-wrap">
                                Check Reservations
                              </a>
                          </div>
  
                      
                      </div>
                      
                      <?php
                        $item_id = [
                          'item_id' => Crypt::encrypt($item->item_id)
                        ]
                      ?>
  
                      <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                      
                        <a href="{{route('itemdetails', $item_id)}}" class="btn btn-sm w-100 btn-outline-dark shadow-none my-1">More details</a>
                      </div>
        
                    </div>
                  </div>
                @endforeach
              @else
                <div class="row mb-3 px-3">
                  <div class="col-md-12 d-flex justify-content-center px-2">
                      <h1>No Equipment Added Yet!</h1>
                  </div>
                </div>
              @endif
            </section>
  
        </div>
      </div>
    </div>
  
  </div>
  