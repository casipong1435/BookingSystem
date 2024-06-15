@extends('client.dashboard')

@section('page-title', 'Tangub Booking Website - About Us')

@section('dashboard-content')

<div class="my-5 px-4">
  <h2 class="fw-bold h-font text-center">ABOUT US</h2>

  <div class="h-line bg-dark"></div>
</div>

<div class="container">
  <div class="row justify-content-between align-items-center">
    <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
      <h3 class="mb-3">Asenso Tangub</h3>
      <p style="text-align: justify">
        Welcome to Tangub City, where we redefine event experiences. As the go-to destination for public rentals, 
        we offer a curated selection of rooms, cutting-edge facilities, and high-quality equipment. Whether it's a 
        corporate meeting, social gathering, or special celebration, our spaces are designed to elevate your events 
        to new heights. Discover the perfect blend of convenience and sophistication with Tangub City – your gateway to unforgettable moments.
      </p>
    </div>
    <div class="col-lg-5 col-md-5 mb-4 order-lg-2 order-md-2 order-1">
      <img src="images/about/Tangub.jpg" class="w-100">
    </div>
  </div>
</div>

@endsection