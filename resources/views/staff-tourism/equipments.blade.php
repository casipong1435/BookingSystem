@extends('staff-tourism.dashboard')

@section('page-title', 'Our Equipments')

@section('dashboard-content')
<div class="container">
  <div class="row">
    @livewire('tourism.tourismequipments')
  </div>
</div>
@endsection