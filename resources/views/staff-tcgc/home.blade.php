@extends('staff-tcgc.dashboard')

@section('page-title', 'Staff TCGC Dashboard')

@section('dashboard-content')
<div class="container">
    <div class="row">
        @livewire('tcgc.tcgc-home')
    </div>
</div>
@endsection