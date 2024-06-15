<div>
        <!-- Swiper Carousal-->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">

                @foreach ($tcgc_featured_items as $items)
                    <div class="swiper-slide">
                        <img src="{{ asset('images/tcgc-items/'.$items->item_img) }}" class="w-100 d-block" height="450" />
                    </div>
                @endforeach

                @foreach ($city_featured_items as $items)
                    <div class="swiper-slide">
                        <img src="{{ asset('images/tourism-items/'.$items->item_img) }}" class="w-100 d-block" height="450" />
                    </div>
                @endforeach
                
            </div>   
        </div>


    <!-- Our Facilities-->

    @if (count($facilities) > 0)
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            @foreach ($facilities as $facility)
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="{{ asset('images/tourism-items/'.$facility->item_img) }}" height="105px" width="150px">
                    <h5 class="mt-3">{{ $facility->item_name }}</h5>
                </div>
            
            <?php
                $item_id = [
                    'item_id' => Crypt::encrypt($facility->item_id)
                ]
            ?>
            @endforeach
            <div class="col-lg-12 text-center mt-5">
                <a href="{{route("client-city-facilities")}}" class="btn btn-sm btn-outline-dark rounded rounded-0 fw-bold shadow-none">More Facilities >>></a>
            </div>
        </div>
    </div>
    @endif

    @if (count($equipments) > 0)
        <!-- Our Equipments -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR EQUIPMENTS</h2>
    <div class="container">
        <div class="row">

            @foreach ($equipments as $equipment)
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350px; margin: auto;">
                        <img src="{{ asset('images/tourism-items/'.$equipment->item_img) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $equipment->item_name }}</h5>
                            @if ($equipment->description)
                                <h6 class="mb-4">{{ $equipment->description }}</h6>
                            @endif
                        </div>
                        <?php
                            $item_id = [
                            'item_id' => Crypt::encrypt($equipment->item_id)
                            ]
                        ?>
                        <div class="mt-1 p-2">
                            <a href="{{ route('itemdetails', $item_id) }}" class="btn btn-sm w-100 btn-outline-dark shadow-none">More details</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-12 text-center mt-5">
                <a href="{{route("client-city-equipment")}}" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Equipments</a>
            </div>
        </div>	
    </div>
    @endif


    <!-- REach us-->

    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">You may reach us</h2>

    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126400.3431388586!2d123.6234582018513!3d8.10038769448597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x32544dd6b65b85bf%3A0x3db69bf9bd604080!2sTangub%20City%2C%20Misamis%20Occidental%2C%20Philippines!5e0!3m2!1sen!2slk!4v1694145662767!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4 ">
            <div class="bg-white p-4 rounded">
                <h5>Call us</h5>
                <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
                <br>
                <a href="tel: +94768799665" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +94 768799665</a>
            </div>	
            <div class="bg-white p-4 rounded">
                <h5>Follow us</h5>
                <a href="#" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-twitter me-1"></i>Twitter
                    </span>
                </a>
                <br>
                <a href="#" class="d-inline-block mb-3">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-facebook me-1"></i>Facebook
                    </span>
                </a>
                <br>
                <a href="#" class="d-inline-block">
                    <span class="badge bg-light text-dark fs-6 p-2">
                        <i class="bi bi-instagram me-1"></i>Instagram
                    </span>
                </a>
            </div>
        </div>
    </div>
    </div>
    <hr>


<!-- JavaScript Bundle with Popper -->


<!-- Swiper JS -->


<!-- Initialize Swiper -->
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
