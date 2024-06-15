@extends('admin-tcgc.dashboard')

@section('page-title', 'Reservation History')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tcgc.tcgchistory')
    </div>
</div>
@endsection