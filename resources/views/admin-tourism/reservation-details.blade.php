@extends('admin-tourism.dashboard')

@section('page-title', 'Reservation Details')

@section('dashboard-content')
<div class="container">
  <div class="row">
    @livewire('tourism.reservation-details', ['id' => $encrypted_id])
  </div>
</div>
@endsection