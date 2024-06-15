@extends('admin-tourism.dashboard')

@section('page-title', 'Reservations')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tourism.tourismreservation')
    </div>
</div>
@endsection