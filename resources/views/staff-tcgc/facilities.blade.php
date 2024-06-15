@extends('staff-tcgc.dashboard')

@section('page-title', 'Our Facilities')

@section('dashboard-content')
<div class="container">
  <div class="row">
    @livewire('tcgc.tcgcfacilities')
  </div>
</div>
@endsection