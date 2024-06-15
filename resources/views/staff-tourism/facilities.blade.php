@extends('staff-tourism.dashboard')

@section('page-title', 'Our Facilities')

@section('dashboard-content')
<div class="container">
  <div class="row">
    @livewire('tourism.tourismfacilities')
  </div>
</div>
@endsection