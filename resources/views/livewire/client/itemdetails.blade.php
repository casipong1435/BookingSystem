<div>

    @include('livewire.client.makereservation')


    <div class="col-md-12 p-3">
        <button type="button" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>
   <div class="col-md-12 text-center">
        <h2 class="mb-2">{{ $item_name }}</h2>
        <!-- Swiper Carousal-->
   <div class="container-fluid">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('images/tourism-items/'.$item_img) }}" class="w-100 d-block" height="450">
                </div>

                @if (count($more_images) > 0)
                    @foreach ($more_images as $items)
                        <div class="swiper-slide">
                            <img src="{{ asset('images/tourism-more-images/'.$items->image_name) }}" class="w-100 d-block" height="450">
                        </div>
                    @endforeach  
                @endif
            </div>   
        </div>
   </div>

   <hr>

  <div class="col-md-12 p-2 text-center">
    <h3>Pricelist</h3>
        <div class="row d-flex justify-content-center align-items-center mt-3">

            <div class="col-md-3 m-4">
                <div class="shadow">
                    <div class="form-group p-2">
                        <b>Note:</b> One (1) Reservation a day per person. Please check the item availability first before making a reservation. Reservations must be made with a minimum interval of 2 hours between each booking.
                    </div>
                </div>
            </div>

        @switch($item_type)
            @case('equipment')
                @if (count($item_data) > 0)
                    <?php
                        $i = 1;
                    ?>

                    @foreach ($item_data as $item)
                        <div class="col-md-3 m-4">
                            <div class="shadow">
                                <div class="form-group border p-2">
                                    <span> Price no. {{ $i++ }}</span>
                                    </div>
                                    <div class="form-group border d-flex justify-content-between p-2">
                                        <div>Status:</div>
                                        <div class="{{ $item->status == 1 ? 'text-primary': 'text-danger' }}">
                                            @if ($item->status == 1)
                                                Available
                                            @else
                                                Not Available
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group border d-flex justify-content-between p-2">
                                        <div>Price:</div>
                                        <div>{{ $item->price }}</div>
                                    </div>
                                    <div class="form-group">
                                        @if (auth()->check())
                                            <div class="form-group mb-1">
                                                <button type="button" class="w-100 btn btn-primary rounded-0 {{ $item->status == 1 ? '': 'disabled' }}" wire:key="{{ $item->id }}" wire:click="addToCart('{{$item->id}}','{{ $client_item_type }}')">
                                                    <div wire:loading wire:target="addToCart('{{$item->id}}','{{ $client_item_type }}')" wire:key="{{ $item->id }}">
                                                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                        <span class="visually-hidden">Adding...</span>
                                                    </div>
                                                    Add to Cart
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" class="w-100 btn btn-success rounded-0 {{ $item->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#MakeReservation" wire:click="getItemName({{$item->item_id}}, {{ $item->id }})">Select</button>
                                            </div>
                                        @else
                                            <button type="button" class="w-100 btn btn-success rounded-0 {{ $item->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#loginModel">Select</button>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="h2">No Prices Added Yet</div>
                @endif

                @break

            @case('facility')

                @if (count($item_data) > 0)

                    <?php
                        $i = 1;
                    ?>
                    @foreach ($item_data as $item)
                        <div class="col-lg-3 m-4">
                            <div class="shadow">
                                <div class="form-group border p-2">
                                    <span> Price no. {{ $i++ }}</span>
                                    </div>
                                    @if ($item->purpose)
                                        <div class="form-group border d-flex justify-content-between p-2">
                                            <div>Purpose:</div>
                                            <div>{{ $item->purpose }}</div>
                                        </div>
                                    @endif
                                    <div class="form-group border d-flex justify-content-between p-2">
                                        <div>Time:</div>
                                        <div>{{ $item->time }}</div>
                                    </div>
                                    <div class="form-group border d-flex justify-content-between p-2">
                                        <div>Status:</div>
                                        <div class="{{ $item->status == 1 ? 'text-primary': 'text-danger' }}">
                                            @if ($item->status == 1)
                                                Available
                                            @else
                                                Not Available
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group border d-flex justify-content-between p-2">
                                        <div class="me-2">Description:</div>
                                        <div>{{ $item->price_description }}</div>
                                    </div>
                                    <div class="form-group border d-flex justify-content-between p-2">
                                        <div>Price:</div>
                                        <div>{{ $item->price }}</div>
                                    </div>
                                    <div class="form-group">
                                        @if (auth()->check())
                                        <div class="form-group mb-1">
                                            <button type="button" class="w-100 btn btn-primary rounded-0 {{ $item->status == 1 ? '': 'disabled' }}" wire:key="{{ $item->id }}" wire:click="addToCart('{{$item->id}}','{{ $client_item_type }}')">
                                                <div wire:loading wire:target="addToCart('{{$item->id}}','{{ $client_item_type }}')" wire:key="{{ $item->id }}">
                                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Adding...</span>
                                                </div>
                                                Add to Cart
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <button type="button" class="w-100 btn btn-success rounded-0 {{ $item->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#MakeReservation" wire:click="getItemName({{$item->item_id}}, {{ $item->id }})">Select</button>
                                        </div>
                                        @else
                                            <button type="button" class="w-100 btn btn-success rounded-0 {{ $item->status == 1 ? '': 'disabled' }}" data-bs-toggle="modal" data-bs-target="#loginModel">Select</button>
                                        @endif
                                    </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="h2">No Prices Added Yet</div>
                @endif
            
            @break
        
        @endswitch
        
        </div>
    </div>

    @include('partials.booking-error')
    

    <script>
        var swiper = new Swiper(".swiper-container", {
          spaceBetween: 30,
          effect: "fade",
          loop: true,
          autoplay: {
              delay: 3500,
              disableOnInteraction: false,
          }
        });
    
        var swiper = new Swiper(".swiper-testimonials", {
          effect: "coverflow",
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: "auto",
          slidesPerView: "3",
          loop: true,
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: false,
          },
          pagination: {
            el: ".swiper-pagination",
          },
          breakpoints: {
              320: {
                  slidesPerView: 1,
              },
              640: {
                  slidesPerView: 1,
              },
              768: {
                  slidesPerView: 2,
              },
              1024: {
                  slidesPerView: 3,
              },
          }
        });
      </script>
</div>
