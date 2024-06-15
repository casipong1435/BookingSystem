@extends('admin-tcgc.dashboard')

@section('page-title', 'Reservations')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tcgc.tcgc-reservation-details', ['id' => $encrypted_id])
    </div>
</div>
@endsection