@extends('staff-tourism.dashboard')

@section('page-title', 'Reservation History')

@section('dashboard-content')
<div class="container">
  <div class="row">
      @livewire('tourism.tourismhistory')
  </div>
</div>
@endsection